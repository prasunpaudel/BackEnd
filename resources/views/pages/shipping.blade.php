@extends('pages.template')
@section('content')
<br><br><br><br>
<div class="row d-flex justify-content-center align-items-center">
  <div class="col-md-8 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h1 class="mb-0 text-center">Biling details</h1>
      </div>
      <div class="card-body">
<form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="street no.">
  </div>
  <br><br><br><br>
  <div class="col-md-12">
                                      <label for="validationCustom04" class="form-label">State</label><br>
                                      <select class="form-select" id="validationCustom04" name="State" required>
                                      <option value="Province-1">Province-1</option>
                                        <option value="Madesh">Madesh</option>
                                        <option value="Bagmati">Bagmati</option>
                                        <option value="Gandaki">Gandaki</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Karnali">Karnali</option>
                                        <option value="SudurPaschim">SudurPaschim</option>
                                      </select>
                                    
                                    </div>
                                    <br><br><br>
  <div class="col-md-3">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip" style="height:30px; width:100px;">
  </div>
  <br><br><br>
  <div class="col-12 d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">proceed</button>
  </div>
</form>
            </div>
        </div>
    </div>
</div>
@stop