
@extends('layout')
@section('content')

  <div class="container">
    <div class="signUp-div">
      <form id="form" action="{{route('store')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate >
        <label><b>انشاء حساب</b></label>
        <br>
        <label>قم بإنشاء حسابك الخاص بكل سهولة عن طريق الايميل</label>
        <br><br>
      {{csrf_field()}}

        @if($errors->any())
          <div class="alert alert-danger" id="alert" role="alert">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <br>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="validationCustomEmail">البريد الالكتروني <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="email" name="email" class="form-control" id="validationCustomEmail" placeholder="xx@xx.com"
                aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                ادخل البريد الالكتروني
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="validationCustomPass">كلمة المرور <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="password" name="password" class="form-control" id="validationCustomPass" placeholder=""
                aria-describedby="inputGroupPrepend" minlength="8" required>
              <div class="invalid-feedback">
                ادخل كلمة مرور تزيد عن ثمانية احرف
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="validationCustomfName">الاسم <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="text" name="name" class="form-control" id="validationCustomfName" placeholder=""
                aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                ادخل الاسم
              </div>
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="validationCustomsName">رقم البطاقه الشخصيه <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="text" minlength="14" maxlength="14" name="ssn" class="form-control" id="validationCustomsName" placeholder=""
                aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                 ادخل رقم البطاقه الشخصيه
              </div>
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="validationCustomState">النوع <span class="red-star"><sup>*</sup></span></label>
            <select id="inputState" class="form-control "
              name="category" required>
              <option value="0"> مسافر</option>
                <option value="1"> يملك سياره</option>
            </select>

          </div>
          <div class="form-group col-md-3 option">
            <label for="validationCustomEmail">الصوره الشخصيه<span class="red-star"><sup>*</sup></span></label>
              <input type="file" name="url" class="form-control" equired>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="validationCustomCity">الجنس <span class="red-star"><sup>*</sup></span></label>
            <select id="inputState" name="gender" class="form-control" id="validationCustomCity" aria-describedby="inputGroupPrepend"
              required>
              <option></option>
              <option>ذكر</option>
              <option>انثى</option>

            </select>
            <div class="invalid-feedback">
              اختر النوع
            </div>
          </div>
          <div class="form-group col-md-3">
            <label for="validationCustomsName">رقم المحمول <span class="red-star"><sup>*</sup></span></label>
            <div class="input-group">
              <input type="tel" name="phonenumber" class="form-control" id="validationCustomsName" pattern="^[0-9-+ ]*$" minlength="11" maxlength="11"
                placeholder="" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                ادخل رقم المحمول المكون من 11 رقم
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <button type="submit" class="btn intro-btn signup-submit">انشاء الحساب</button>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection