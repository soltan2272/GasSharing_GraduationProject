﻿@extends('admin.layout')
@section('content')


        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>تعديل محتوى الموقع</h2>
                        <h5>الصفحة الرئيسية</h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
               @if(count($home)>0)
                    @foreach($home as $h)
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span> شعار الموقع </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('websitelogo')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label> الشعار الرئيسي</label>
                                                        <input class="form-control-file" type="file" name="m_i"
                                                            accept="image/x-png, image/jpeg"
                                                            oninvalid="this.setCustomValidity('  ')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label> ايقونة الموقع الصغيرة - *.ico</label>
                                                        <input class="form-control-file" type="file" name="s_i"
                                                            accept="image/x-icon "
                                                            oninvalid="this.setCustomValidity('  ')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>مقدمة الترحيب</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('websitewelcome')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group ">
                                                <label>كلمة الترحيب</label>
                                                <input class="form-control" name="w_title" value="{{$h->welcome_title}}"
                                                    oninvalid="this.setCustomValidity('كلمة الترحيب مطلوبة')"
                                                    oninput="this.setCustomValidity('')" required />
                                            </div>
                                            <div class="form-group">
                                                <label>نص الترحيب</label>
                                                <textarea class="form-control" style="max-width: 100%" rows="4"  name="w_text"
                                                    oninvalid="this.setCustomValidity('نص الترحيب مطلوب')"
                                                    oninput="this.setCustomValidity('')"  required>{{$h->welcome_text}}</textarea>
                                            </div>
                                            <div class="form-group ">
                                                <label>الصورة</label>
                                                <input class="form-control-file" type="file"  name="w_image"
                                                    accept="image/x-png,image/gif,image/jpeg" required>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>معرض الصور المتحرك</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('animationphoto')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 1</label>
                                                        <input class="form-control" name="a_t1" value="{{$h->Animation_title1}}"
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 1</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt1"
                                                            oninvalid="this.setCustomValidity('نص الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> {{$h->Animation_text1}} </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 1</label>
                                                        <input class="form-control-file" type="file" name="a_m1"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 1 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 2</label>
                                                        <input class="form-control" name="a_t2" value="{{$h->Animation_title2}}"
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 2</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt2"
                                                            oninvalid="this.setCustomValidity('نص الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> {{$h->Animation_text2}} </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 2</label>
                                                        <input class="form-control-file" type="file" name="a_m2"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 2 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 3</label>
                                                        <input class="form-control" name="a_t3" value="{{$h->Animation_title3}}"
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 3</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt3"
                                                            oninvalid="this.setCustomValidity('نص الترحيب مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> {{$h->Animation_text3}} </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 3</label>
                                                        <input class="form-control-file" type="file" name="a_m3"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 3 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 4</label>
                                                        <input class="form-control" name="a_t4" value="{{$h->Animation_title4}}"
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 4</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt4"
                                                            oninvalid="this.setCustomValidity('نص الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> {{$h->Animation_text4}} </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 4</label>
                                                        <input class="form-control-file" type="file" name="a_m4"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 4 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>معرض الصور</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form"  action="{{route('gallaryphoto')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 1</label>
                                                        <input class="form-control" name="g_t1" value="{{$h->gallary_title1}}"
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 1</label>
                                                        <input class="form-control-file" type="file" name="g_m1"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 1 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 2</label>
                                                        <input class="form-control" name="g_t2" value="{{$h->gallary_title2}}"
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 2</label>
                                                        <input class="form-control-file" type="file" name="g_m2"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 2 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 3</label>
                                                        <input class="form-control" name="g_t3" value="{{$h->gallary_title3}}"
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 3</label>
                                                        <input class="form-control-file" type="file" name="g_m3"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 3 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>معلومات عنا</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('info')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>الهاتف</label>
                                                        <input class="form-control" type="tel" pattern="^[0-9-+ ]*$" name="phone" value="{{$h->about_phone}}"
                                                            placeholder="01234567890" minlength="11" maxlength="11"
                                                            oninvalid="this.setCustomValidity('ادخل رقم الهاتف مكون من 11 رفم ')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>البريد الالكتروني</label>
                                                        <input class="form-control" type="email" name="email" value="{{$h->about_email}}"
                                                            placeholder="xxx@xxx.xxx" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>حساب فيس بوك</label>
                                                        <input class="form-control" type="text" name="a_f" value="{{$h->about_facebook}}"
                                                            placeholder="http://www.facebook.com/xxx"
                                                            oninput="this.setCustomValidity('http://www.facebook.com/xxx')"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>حساب تويتر</label>
                                                        <input class="form-control" type="text" name="a_t" value="{{$h->about_twiteer}}"
                                                            placeholder="http://twitter.com/xxx"
                                                            oninput="this.setCustomValidity('http://twitter.com/xxx')"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>حساب لينكيد ان</label>
                                                        <input class="form-control" type="text" name="a_l" value="{{$h->about_linkedin}}"
                                                            placeholder="https://www.linkedin.com/in/xxx"
                                                            oninput="this.setCustomValidity('https://www.linkedin.com/in/xxx')"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>قناة يوتيوب</label>
                                                        <input class="form-control" type="text" name="a_y" value="{{$h->about_youtube}}"
                                                            placeholder="https://www.youtube.com/channel/xxx"
                                                            oninput="this.setCustomValidity('https://www.youtube.com/channel/xxx')"
                                                            required />
                                                    </div>

                                                </div>
                                            </div>
                                            

                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
            @else
                 <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span> شعار الموقع </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('websitelogo')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label> الشعار الرئيسي</label>
                                                        <input class="form-control-file" type="file" name="m_i"
                                                            accept="image/x-png, image/jpeg"
                                                            oninvalid="this.setCustomValidity('  ')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label> ايقونة الموقع الصغيرة - *.ico</label>
                                                        <input class="form-control-file" type="file" name="s_i"
                                                            accept="image/x-icon "
                                                            oninvalid="this.setCustomValidity('  ')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>مقدمة الترحيب</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('websitewelcome')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group ">
                                                <label>كلمة الترحيب</label>
                                                <input class="form-control" name="w_title" value=""
                                                    oninvalid="this.setCustomValidity('كلمة الترحيب مطلوبة')"
                                                    oninput="this.setCustomValidity('')" required />
                                            </div>
                                            <div class="form-group">
                                                <label>نص الترحيب</label>
                                                <textarea class="form-control" style="max-width: 100%" rows="4"  name="w_text"
                                                    oninvalid="this.setCustomValidity('نص الترحيب مطلوب')"
                                                    oninput="this.setCustomValidity('')"  required></textarea>
                                            </div>
                                            <div class="form-group ">
                                                <label>الصورة</label>
                                                <input class="form-control-file" type="file"  name="w_image"
                                                    accept="image/x-png,image/gif,image/jpeg" required>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>معرض الصور المتحرك</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('animationphoto')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 1</label>
                                                        <input class="form-control" name="a_t1" value=""
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 1</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt1"
                                                            oninvalid="this.setCustomValidity('نص الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 1</label>
                                                        <input class="form-control-file" type="file" name="a_m1"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 1 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 2</label>
                                                        <input class="form-control" name="a_t2" value=""
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 2</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt2"
                                                            oninvalid="this.setCustomValidity('نص الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 2</label>
                                                        <input class="form-control-file" type="file" name="a_m2"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 2 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 3</label>
                                                        <input class="form-control" name="a_t3" value=""
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 3</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt3"
                                                            oninvalid="this.setCustomValidity('نص الترحيب مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 3</label>
                                                        <input class="form-control-file" type="file" name="a_m3"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 3 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 4</label>
                                                        <input class="form-control" name="a_t4" value=""
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نص الصورة 4</label>
                                                        <textarea class="form-control" style="max-width: 100%" rows="4" name="a_tt4"
                                                            oninvalid="this.setCustomValidity('نص الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required> </textarea>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 4</label>
                                                        <input class="form-control-file" type="file" name="a_m4"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 4 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>معرض الصور</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form"  action="{{route('gallaryphoto')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 1</label>
                                                        <input class="form-control" name="g_t1" value=""
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 1</label>
                                                        <input class="form-control-file" type="file" name="g_m1"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 1 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 2</label>
                                                        <input class="form-control" name="g_t2" value=""
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 2</label>
                                                        <input class="form-control-file" type="file" name="g_m2"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 2 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>عنوان الصورة 3</label>
                                                        <input class="form-control" name="g_t3" value=""
                                                            oninvalid="this.setCustomValidity('عنوان الصورة مطلوب')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group ">
                                                        <label>الصورة 3</label>
                                                        <input class="form-control-file" type="file" name="g_m3"
                                                            accept="image/x-png,image/gif,image/jpeg"
                                                            oninvalid="this.setCustomValidity('الصورة 3 مطلوبة')"
                                                            oninput="this.setCustomValidity('')" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <span>معلومات عنا</span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="{{route('info')}}" method="post" enctype="multipart/form-data" novalidate>
                                        {{csrf_field()}}
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="panel panel-back noti-box">
                                                    <div class="form-group ">
                                                        <label>الهاتف</label>
                                                        <input class="form-control" type="tel" pattern="^[0-9-+ ]*$" name="phone" value=""
                                                            placeholder="01234567890" minlength="11" maxlength="11"
                                                            oninvalid="this.setCustomValidity('ادخل رقم الهاتف مكون من 11 رفم ')"
                                                            oninput="this.setCustomValidity('')" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>البريد الالكتروني</label>
                                                        <input class="form-control" type="email" name="email" value=""
                                                            placeholder="xxx@xxx.xxx" required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>حساب فيس بوك</label>
                                                        <input class="form-control" type="text" name="a_f" value=""
                                                            placeholder="http://www.facebook.com/xxx"
                                                            oninput="this.setCustomValidity('http://www.facebook.com/xxx')"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>حساب تويتر</label>
                                                        <input class="form-control" type="text" name="a_t" value=""
                                                            placeholder="http://twitter.com/xxx"
                                                            oninput="this.setCustomValidity('http://twitter.com/xxx')"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>حساب لينكيد ان</label>
                                                        <input class="form-control" type="text" name="a_l" value=""
                                                            placeholder="https://www.linkedin.com/in/xxx"
                                                            oninput="this.setCustomValidity('https://www.linkedin.com/in/xxx')"
                                                            required />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>قناة يوتيوب</label>
                                                        <input class="form-control" type="text" name="a_y" value=""
                                                            placeholder="https://www.youtube.com/channel/xxx"
                                                            oninput="this.setCustomValidity('https://www.youtube.com/channel/xxx')"
                                                            required />
                                                    </div>

                                                </div>
                                            </div>
                                            

                                            <div class="text-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn btn-success submit-btn"
                                                    style="display: block;margin-right: auto;margin-left: auto; ">حفظ
                                                    التعديلات</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             


            </div>
        </div>
    </div>
@endif
    <!-- Modal -- Edit account -->
   @endsection