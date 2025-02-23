<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Classroom;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\SpinWheelEntry;
use App\Models\User;
use App\Services\AdminService;
use App\Services\OrderService;
use App\Services\ProductService;
use App\Services\UserService;
use Carbon\Carbon;
use Endroid\QrCode\Builder\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function Laravel\Prompts\error;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class OrderController extends Controller
{
    public function show(Request $request){
        $order = $this->getOrder($request);
        return view('user.order', compact('order'));
    }

    public function showJson(Request $request){
        $order = $this->getOrder($request);
        return response()->json($order);
    }

    /**
     * @param Request $request
     * @return Order|Collection|Model
     */
    public function getOrder(Request $request): Order|Collection|Model
    {
        $formData = $request->validate([
            "order_id" => "required|exists:orders,id",
        ]);
        $orderId = intval($formData['order_id']);
        /** @var User $user */
        $user = auth()->user();
        $order = Order::query()->with(["products", "classroom"])->where("user_id", $user->getId())->find($orderId);
        if ($order === null) {
            throw new NotFoundHttpException();
        }
        return $order;
    }



    public function getOrderQrCode(Request $request){
        $order = Order::query()->find($request->input('id'));

        $result = new QrCode(
            data: json_encode([
                "order_id" => $order->getId(),
                "user_id" => $order->getUserId(),
            ]),
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        $writer = new PngWriter();
        $toSave = $writer->write($result);

        $path = public_path('images/qr_codes');

        // Verifica se la directory esiste, altrimenti creala
        if (!file_exists($path)) {
            mkdir($path, 0755, true); // Crea la directory con permessi ricorsivi
        }

        $toSave->saveToFile($path."/".$order->getId().'.png');

        return view("admin.qrCodeViewer", ["qrCode" => $order->getId()]);
    }

    public function scanQrCode(Request $request){
        $order = Order::query()->find($request->input('id'));
        return view("admin.scanner",compact("order"));
    }

    public function checkValidity(Request $request){
        // if the qr code is correct i should get params like this => {"id":1,"user_id":1}
        $formData = $request->validate([
            "params" => "required",
            "cliccked_id" => "required",
        ]);

        
        try {
            $formData = json_decode($formData['params'], true);
            if(!isset($formData['order_id']) || !isset($formData['user_id']))
            return response()->json(["valid" => false]);
        
            if($formData['order_id'] != $request->cliccked_id)
            return response()->json(["valid" => false]);
            $order = Order::query()->find($formData['order_id']);
            if($order->getUserId() == $formData['user_id']){
                $order->setStatus(4);
                $order->save();
                return response()->json(["valid" => true]);
            }
            return response()->json(["valid" => false]);
        } catch (\Throwable $th) {
            return response()->json(["valid" => false]);
        }
    }

    public function goDelivery(Request $request){
        $formData = $request->validate([
            "id" => "required|exists:orders,id",
        ]);
        $order = Order::query()->find($formData['id']);
        $order->setStatus(3);
        $order->save();
        return redirect()->route('admin.dashboard');
    }

    function getOrderPage(Request $request){
        $request->validate([
            "id" => "required|exists:orders,id",
        ]);

        /** @var User $user */
        $user = auth()->user();
        $order = Order::query()->withProductRating($user->id)->find($request->input('id'));
        return view("user.get_order", compact("order"));
    }
}
