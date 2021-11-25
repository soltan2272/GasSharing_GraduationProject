@extends('layout')
@section('content')

  <div class="container">
    <div class="newPosr-div">
      <div class="row">
        <div class="col-12 post-toggle-hdr">
          <div class="list-group post-toggle" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
              href="#list-home" role="tab" aria-controls="home" onclick="resetNewPostForms();"><b>اضافة رحلة</b></a>
          </div>
        </div>
        <div class="col-12 post-div-part">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
              <form id="form"class="needs-validation" enctype="multipart/form-data" method="post" action="{{route('insertpost')}}" novalidate>
                {{csrf_field()}}
                  @if($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="validationCustomEmail">من محافظة<span class="red-star"><sup>*</sup></span></label>
                    <select id="inputState" class="form-control countries"
                      onchange=" $('.option select').prop('selected', false);"
                      oninvalid="this.setCustomValidity('اختر المحافظة')" oninput="this.setCustomValidity('')"
                      id="validationCustomState" aria-describedby="inputGroupPrepend" name="fromstate" required>
                      <option disabled selected hidden> </option>

                    </select>
                    <div class="invalid-feedback">
                      اختر المحافظة
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="validationCustomEmail">الى محافظة<span class="red-star"><sup>*</sup></span></label>
                    <select id="inputState" class="form-control countries"
                            onchange=" $('.option select').prop('selected', false);"
                            oninvalid="this.setCustomValidity('اختر المحافظة')" oninput="this.setCustomValidity('')"
                            id="validationCustomState" aria-describedby="inputGroupPrepend" name="tostate" required>
                      <option disabled selected hidden> </option>

                    </select>
                    <div class="invalid-feedback">
                      اختر المحافظة
                    </div>
                  </div>

                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="validationCustomEmail">مكان المقابلة بالتفصيل<span
                              class="red-star"><sup>*</sup></span></label>
                    <br>
                    <div class="input-group">
                      <input type="text" class="form-control" id="validationCustomsName" placeholder=""
                             aria-describedby="inputGroupPrepend" oninvalid="this.setCustomValidity('اكتب العنوان بالتفصيل')"
                             oninput="this.setCustomValidity('')" name="addressdetails" required>
                      <div class="invalid-feedback">
                        ادخل عنوانك بالتفصيل
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label> الوقت </label>
                    <input type="time" class="form-control" name="time">

                  </div>
                  <div class="form-group col-md-4">
                    <label> التاريخ </label>
                    <input type="date" class="form-control" name="date">

                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="validationCustomEmail">معلومات اخرى عن الرحلة<span
                        class="red-star"><sup>*</sup></span></label>
                    <br>
                    <div class="input-group">
                      <textarea name="moredetails" class="form-control"
                        oninput="this.setCustomValidity('')"></textarea>
                      <div class="invalid-feedback">
                        ادخل معلومات اخرى تساعد في ايجاده
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <div class="">
                      <label for="validationCustomEmail">ارفع صور خاصة بالسيارة<span
                          class="red-star"><sup>*</sup></span></label>
                      <input name="img" class="form-control" type="file"
                        oninvalid="this.setCustomValidity('ارفع صور بها السياره')"
                        oninput="this.setCustomValidity('')"  required>
                      <div class="invalid-feedback">
                        ارفع صورا بها السياره
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-4">
                    <div class="">
                      <label for="validationCustomEmail">ادخل رقم السياره<span
                                class="red-star"><sup>*</sup></span></label>
                      <input name="carssn" class="form-control" type="text"   minlength="4" maxlength="6"  oninvalid="this.setCustomValidity('ادخل رقم السياره')"
                             oninput="this.setCustomValidity('')"  required>
                      <div class="invalid-feedback">
                        ادخل رقم السياره
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-5">
                    <div class="">
                      <label for="validationCustomEmail">ادخل موديل السياره<span
                                class="red-star"><sup>*</sup></span></label>
                      <input name="carmodel" class="form-control" type="text"  oninvalid="this.setCustomValidity('ادخل موديل السياره')"
                             oninput="this.setCustomValidity('')"  required>
                      <div class="invalid-feedback">
                        ادخل موديل السياره
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="">
                      <input type="submit" class="btn intro-btn editProfile-btn" value="نشر">
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


  @endsection