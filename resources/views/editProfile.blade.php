
@extends('layout')
@section('content')
  <div class="container">
    <div class="signUp-div">
      <form id="form" action="{{route('store_editProfile')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate >
        <label><b>تعديل الحساب</b></label>
        <br>
        <br><br>
      {{csrf_field()}}
        <!-- Choose only one -- GREEN for successful data AND red for unseccessful data -->
        <!-- GREEN -->
        <!-- <div class="alert alert-success" id="alert" role="alert">
                    تم حفظ البيانات بنجاح
                    </div> -->

        <!-- RED -->

        
        <br>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="validationCustomEmail">البريد الالكتروني <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="email" name="email" value="{{$user->email}}"  class="form-control" id="validationCustomEmail" placeholder="xx@xx.com"
                aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                ادخل البريد الالكتروني
              </div>
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="validationCustomfName">الاسم <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group
            ">
              <input type="text" name="name" value="{{$user->name}}" class="form-control" id="validationCustomfName" placeholder=""
                aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                ادخل الاسم
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
         
          <div class="form-group col-md-3">
            <label for="validationCustomsName">رقم البطاقه الشخصيه <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="text" minlength="14" maxlength="14" name="ssn" value="{{$user->ssn}}" class="form-control" id="validationCustomsName" placeholder=""
                aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                 ادخل رقم البطاقه الشخصيه
              </div>
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="validationCustomsName">رقم المحمول <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="tel" name="phonenumber" value="{{$user->phonenumber}}" class="form-control" id="validationCustomsName" pattern="^[0-9-+ ]*$" minlength="11" maxlength="11"
                placeholder="" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                ادخل رقم المحمول المكون من 11 رقم
              </div>
            </div>
          </div>
         
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="validationCustomCity">الجنس <span class="red-star"><sup>*</sup></span></label>
            <select id="inputState" name="gender"  value="{{$user->gender}}" class="form-control" id="validationCustomCity" aria-describedby="inputGroupPrepend"
              required>
              
              <option >ذكر</option>
              <option >انثى</option>

            </select>
            <div class="invalid-feedback">
              اختر النوع
            </div>
          </div>
          <div class="form-group col-md-3 option">
            <label for="validationCustomEmail">الصوره الشخصيه<span class="red-star"><sup>*</sup></span></label>
              <input type="file" name="url"  class="form-control" equired>
              {{$user->url}}
          </div>
         
          <div class="form-group col-md-6">
            <button type="submit" class="btn intro-btn signup-submit">حفظ التعديلات</button>
          </div>
        
        </div>
      </form>
    </div>
  </div>

@endsection