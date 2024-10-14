<form class="mt-4">

    <input type="hidden" id="mode_of_flight" value="Oneway">
    <input type="hidden" class="user_ip">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="mb-2 custom-label">LEAVING FORM</label>
            <div class="input-group input-group-bg mb-20">
                <input type="text" name="destination_form_multi" id="destination_form_multi"
                    class="form-control " placeholder="From"
                    aria-label="Name" />
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label class="mb-2 custom-label">GOING TO</label>
            <div class="input-group input-group-bg mb-20">
                <input type="text" name="destination_to_multi" id="destination_to_multi"
                    class="form-control" placeholder="To"
                    aria-label="Name" />
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label class="mb-2 custom-label">SEAT TYPE</label>
            <select name="cabin_class_multi"
                class="input-group input-group-bg mb-20 form-control"
                id="cabin_class_multi">
                <option value="Economy">Economy</option>
                <option value="Business">Business</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="mb-2 custom-label">DEPARTING ON</label>
            <div class="input-group input-group-bg mb-20">
                <input type="date" name="departing_on_multi" class="form-control"
                    id="departing_on_multi" placeholder="DEPARTING ON"
                    aria-label="Name" />
            </div>
        </div>


        <div class="col-md-12">

            <div class="mt-4">
                {{-- <button href="{{ url('admin/flight_search_result') }}"
                style="text-decoration: none;"
                class="btn btn-outline-primary btn-flat">Search Flight</button> --}}
                <button onclick="getFlights()" type="button"
                    style="text-decoration: none;"
                    class="btn btn-outline-primary btn-flat">Search
                    Flight</button>

                {{-- <button href="{{ url('admin/flight_search_result') }}" style="text-decoration: none;" class ="btn btn-outline-primary btn-flat">Search Flight</button> --}}
            </div>
        </div>
    </div>
</form>






<div class="col-md-4">
    <label class="mb-2 custom-label">FORM</label>
    <div class="input-group input-group-bg mb-20">
        <input type="text"    class="form-control" placeholder="From"
            aria-label="Name" />
    </div>
</div>
<div class="col-md-4">
    <label class="mb-2 custom-label">TO</label>
    <div class="input-group input-group-bg mb-20">
        <input type="text" class="form-control" placeholder="To"
            aria-label="Name" />
    </div>
</div>
<div class="col-md-4">
    <label class="mb-2 custom-label">DATE</label>
    <div class="input-group input-group-bg mb-20">
        <input type="date" class="form-control" aria-label="Name" />
    </div>
</div>
<div class="col-md-12 mt-3">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label class="mb-2 custom-label">ADULT</label>
            <select
                class="input-group input-group-bg mb-20 form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2 custom-label">CHILD</label>
            <select
                class="input-group input-group-bg mb-20 form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label class="mb-2 custom-label">KIDS</label>
            <select
                class="input-group input-group-bg mb-20 form-control">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    </div>

</div>



<div class="col-md-4">
    <label class="mb-2 custom-label">FORM</label>
    <div class="input-group input-group-bg mb-20">
        <input type="text"  name='destination_form_multi_"+new_chq_no+"' id='destination_form_multi_"+new_chq_no+"' class="form-control"   placeholder="From"
            aria-label="Name" / >
    </div>
</div>
<div class="col-md-4">
    <label class="mb-2 custom-label">TO</label>
    <div class="input-group input-group-bg mb-20">
        <input type="text" name='destination_to_multi_"+new_chq_no+"'  id='destination_to_multi_"+new_chq_no+"' class="form-control" placeholder="To"
            aria-label="Name" />
    </div>
</div>
<div class="col-md-4">
    <label class="mb-2 custom-label">DATE</label>
    <div class="input-group input-group-bg mb-20">
        <input type="date"  name='departing_on_multi_"+new_chq_no+"' id='departing_on_multi_"+new_chq_no+"'  class="form-control" aria-label="Name" />
    </div>
</div>

id='new_"+new_chq_no+"'

var new_input="<input type='text' id='new_"+new_chq_no+"'>";