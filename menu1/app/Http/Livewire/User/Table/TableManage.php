<?php

namespace App\Http\Livewire\User\Table;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Table;
use Auth;
use GuzzleHttp\Client;

class TableManage extends Component
{
    protected $listeners = ['refresh-table-Component' => 'render'];
    public $tableData;
    public $table_no;
    public $table_id;
    public $qrCodeImage;

    public function openModal($table_id)
    {

        $tableData = Table::find($table_id);
        $this->table_no = $tableData->table_no;
        $this->table_id = $tableData->id;
        $this->qrCodeImage = '';

        $this->dispatchBrowserEvent('openPagamentoLongModal');
    }

    public function render()
    {
        $user = Auth::user();
        $tables= Table::where('user_id',$user->id)->get();
        return view('livewire.user.table.table-manage',compact('tables'));
    }

    public function tableadd(){
        $user = Auth::user();

        $existingTable = Table::where('user_id', $user->id)->orderBy('table_no', 'desc')->first();

        $table = new Table;
        $table->user_id = $user->id;

        if ($existingTable) {
            // If there are existing tables, increment the highest table_no by 1
            $table->table_no = $existingTable->table_no + 1;
        } else {
            // If no existing tables, set table_no to 1
            $table->table_no = 1;
        }
        $table->save();
        $this->emit('refresh-table-Component');
    }

    public function updateTable(Request $request){
        $user = Auth::user();
         $validatedData = $this->validate([
        'table_no' => 'required|unique:tables,table_no,' . $this->table_id . ',id,user_id,' . $user->id,
    ]);
        
        $table = Table::find($this->table_id);
        $table->table_no = $this->table_no;
        $table->save();
        $request->session()->flash('message','Table update succsessfully.');
        $this->dispatchBrowserEvent('closePagamentoLongModal');
    }

    public function tableDelete(Request $request,$table_id){

        $table = Table::find($table_id);
        $table->delete();
        $request->session()->flash('message','Table deleted succsessfully.');
        $this->dispatchBrowserEvent('closePagamentoLongModal');
    }

    public function tableQrPrint(Request $request,$table_no)
    {
        $user = Auth::user();

       $qrText = url('/').'/menu/'.$user->slug.'?table='.$table_no; // Text to encode in the QR code
       $qrSize = 300; // Size of the QR code image in pixels

       // Construct the URL for generating QR code
       $this->qrCodeImage = "https://chart.googleapis.com/chart?chs={$qrSize}x{$qrSize}&cht=qr&chl=" . urlencode($qrText);

    //    $this->emit('printDocument');
    }
    public function menuOpen(Request $request,$table_no){
        $user = Auth::user();
        
        return redirect()->route('menu',['slug' => $user->slug,'table' =>base64_encode($table_no)]);
    }
}
