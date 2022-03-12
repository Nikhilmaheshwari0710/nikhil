<?php

namespace App\Http\Livewire;
use App\Models\task;
use Carbon\Carbon;
use Livewire\Component;

class Nikhil extends Component
{
   public $data;
   public $todaydata;
   public $task;
   public $date;
   public $time;
   public $desc;
   public $pri;
   public $whttoday;
   public $msg;
    public function mount()
   {
       $temp = task::all()->sortByDesc("created_at");
       $this->data = $temp;
       $this->whttoday = carbon::now()->toDateString();

   }
    public function add()
    {
        if($this->task =="" &&  $this->date =="" && $this->time =="" && $this->desc =="" && $this->pri == "" )
        {
            return;
        }
       $cc = new task();
       $cc->uid = 1;
       $cc->task = $this->task;
       $cc->description = $this->desc;
       $cc->deadline = $this->date .' '. $this->time;
       $cc->priority = $this->pri;
       $cc->save();
      // $this->msg = "Task Added Successfully";
        $this->data->prepend($cc); 
       // $this->msg = ""; 
       $this->task = "";
       $this->desc = "";
       $this->date = "";
       $this->time = "";
       
    
        
    }
    public function render()
    {
        return view('livewire.nikhil');
    }
}
