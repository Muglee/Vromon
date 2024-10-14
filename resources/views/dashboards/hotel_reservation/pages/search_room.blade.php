<section class="content">
    <div class="container-fluid">
        <form action="{{route('room.Search')}}" method="post">
            @csrf
            <div class="row" >
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="branch_name" class="form-control select2"  style="width: 100%;" required="required">
                            <option value=""> Select Branch</option>
                            @foreach($branch_list  as $data)
                                <option  value="{{ $data }}"> {{ $data }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" value="date('Y-m-d H:i:s')" name="check_in" class="form-control"  placeholder="Check in" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" value="date('Y-m-d H:i:s')" name="check_out" class="form-control"  placeholder="Check out" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" style="width: 100%;" class="btn btn-info">Search</button>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
    </div>
    <script>
        $("#date_timepicker_end").datepicker()
        {
            "dateFormat" : "dd-mm-yyyy";
        };
    </script>
</section>