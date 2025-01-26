<?php

namespace App\Http\Controllers;

use App\Models\SpinWheelEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailySpinController extends Controller
{
    public function editView()
    {
        $adminId = Auth::guard('admin')->user()->getId();
        $entries = SpinWheelEntry::where('admin_id', $adminId)->get();
        return view('admin.editDailySpinsMobile', ['entries' => $entries]);
    }

    public function add(Request $request){
        $request->validate([
            "entries" => "required|array",
            "entries.*.text"=> "required|string",
            "entries.*.prize"=> "required|numeric|min:0"
        ]);

        //check if the new entries lenght + the current entries length is greater or equal to 4
        $adminId = Auth::guard('admin')->user()->getId();
        $currentEntries = SpinWheelEntry::where('admin_id', $adminId)->get();
        if(count($currentEntries) + count($request->input('entries')) < 4){
            return redirect()->back()->with('error', 'You can only have 4 entries');
        }
        
        $entries = $request->input('entries');
        $admin = Auth::guard('admin')->user();
        
        foreach ($entries as $key => $entry) {
            SpinWheelEntry::create([
                'text' => $entry['text'],
                'prize' => $entry['prize'],
                'admin_id' => $admin->getId()
            ]);
        }

        return redirect()->back()->with('success', 'Entries added successfully');
    }

    public function destroy(Request $request){
        $request->validate([
            "id" => "required|integer"
        ]);

        $adminId = Auth::guard('admin')->user()->getId();
        $currentEntries = SpinWheelEntry::where('admin_id', $adminId)->get();
        if(count($currentEntries) - 1 < 4){
            return redirect()->back()->with('error', "You can't have less than 4 entries");
        }

        $entry = SpinWheelEntry::find($request->input('id'));
        $entry->delete();

        return redirect()->back()->with('success', 'Entry deleted successfully');
    } 
}
