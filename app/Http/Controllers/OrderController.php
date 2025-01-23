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
            data: json_encode($order),
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
}
