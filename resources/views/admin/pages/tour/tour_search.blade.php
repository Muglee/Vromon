@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-6">
<form class="form-horizontal">
    <fieldset>
    
    <!-- Form Name -->
    <legend>Search and Book Tour Package</legend>
    <legend>We're bringing you a new level of comfort.</legend>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="selectbasic">Destination Country</label>
      <div class="col-md-12">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="0">Select Country</option>
          <option value="1">Bangladesh</option>
          <option value="2">India</option>
          <option value="3">Nepal</option>
          <option value="3">Singapur</option>
          <option value="3">Thailand</option>
        </select>
      </div>
    </div>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="selectbasic">Total Travellers</label>
      <div class="col-md-12">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
    </div>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="selectbasic">Total Rooms</label>
      <div class="col-md-12">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
    </div>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="selectbasic">Adults</label>
      <div class="col-md-12">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
    </div>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="selectbasic">Childs</label>
      <div class="col-md-12">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
    </div>
    
    <!-- Select Basic -->
    <div class="form-group">
      <label class="col-md-12 control-label" for="selectbasic">Hotel Rating Star</label>
      <div class="col-md-12">
        <select id="selectbasic" name="selectbasic" class="form-control">
          <option value="3">Hotel Star</option>
          <option value="1">3 Star</option>
          <option value="2">4 Star</option>
          <option value="3">5 Star</option>
        </select>
      </div>
    </div>
    
    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="singlebutton"></label>
      <div class="col-md-4">
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Book Holidays</button>
      </div>
    </div>
    
    </fieldset>
    </form>
</div>
</div>
</div>

@endsection