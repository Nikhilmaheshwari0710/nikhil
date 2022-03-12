<div>
    @if($msg != null)
        <script>
            alert('{{$msg}}');
        </script>
    @endif
    {{$pri}}
    <div class="flexs">
        <div class="container" style=" border-radius:15px; padding:25px; background:linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url('{{url('nature.jpg')}}'); background-position:center; background-size:cover; color:#fff;">
            <div class="row">
                <div class="col-md-12">
                    <h1>TO DO List</h1>
                </div>
            </div>
            <form wire:submit.prevent="add()">
                <div class="row">
                    <div class="col-md-6">
                        Task <input type="text" class="form-control" wire:model.lazy="task" placeholder="Enter Task Here...">
                        Assigned To<input type="text" class="form-control " wire:model.lazy="desc" placeholder="Enter Assigned To">
                    </div>
                    <div class="col-md-6">
                        Deadline <input type="date" wire:model.defer="date" min="{{$whttoday}}" class="form-control">
                        Time <input type="time" wire:model.lazy="time" class="form-control">

                    </div>
                    <div class="col-md-6">
                        Priority
                        <select class="form-control" wire:model="pri">
                            <option value="default">Select Priority</option>
                            <option value="high">High</option>
                            <option value="low">low</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-4">
                        <button type="submit" class="btn btn-danger" style="width:100px;">Add &nbsp; +</button>
                    </div>
                    <div class="col-md-6 mt-4">

                    </div>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <h4>Your Todays Tasks</h4> 
                  <div class="singleline">  <p> <div class="blue"></div> Low Priority <div class="red"></div>High Priority</p></div>
                </div>
            </div>
            <div class="row ">
              
                @foreach($data as $d)
                @if($d->created_at->toDateString() == $whttoday)
                    @if($d->priority == 'high')
                <div class="col-md-12">
                    <div class="card mt-2 mb-2" style="background: brown; color:#fff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>{{$d->task;}} </h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;">Deadline: &nbsp; {{$d->deadline}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$d->description;}}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;"> {{$d->created_at->diffForHumans()}} </p>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="card mt-2 mb-2" style="background: darkblue; color:#fff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>{{$d->task;}} </h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;">Deadline: &nbsp; {{$d->deadline}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$d->description;}}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;"> {{$d->created_at->diffForHumans()}} </p>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
            
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <h4>Your Old Tasks</h4>
                </div>
            </div>
            <div class="row ">
                @foreach($data as $d)
                @if($d->created_at->toDateString() != $whttoday)
                @if($d->priority == 'high')
                <div class="col-md-12">
                    <div class="card mt-2 mb-2" style="background: brown; color:#fff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>{{$d->task;}} </h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;">Deadline: &nbsp; {{$d->deadline}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$d->description;}}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;"> {{$d->created_at->diffForHumans()}} </p>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="card mt-2 mb-2" style="background: darkblue; color:#fff;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>{{$d->task;}} </h5>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;">Deadline: &nbsp; {{$d->deadline}}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>{{$d->description;}}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p style="font-size:12px;"> {{$d->created_at->diffForHumans()}} </p>
                                </div>
                            </div>
                           

                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>
    </div>




</div>