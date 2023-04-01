@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1> Page OtherItem </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-other-item', [$getOtherItem->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Login Heading *</label>
                                            <input type="text" class="form-control" name="login_page_heading"
                                                value="{{ $getOtherItem->login_page_heading }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Login Title *</label>
                                            <input type="text" class="form-control" name="login_page_title"
                                                value="{{ $getOtherItem->login_page_title }}">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Login Seo Description *</label>
                                            <textarea textarea class="form-control" placeholder="Leave a seo description here" id="floatingTextarea2"
                                                style="height: 100px" name="login_page_seo_description">{{ $getOtherItem->login_page_seo_description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Register Heading *</label>
                                            <input type="text" class="form-control" name="register_page_heading"
                                                value="{{ $getOtherItem->register_page_heading }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Register Title *</label>
                                            <input type="text" class="form-control" name="register_page_title"
                                                value="{{ $getOtherItem->register_page_title }}">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Register Seo Description *</label>
                                            <textarea textarea class="form-control" placeholder="Leave a seo description here" id="floatingTextarea2"
                                                style="height: 100px" name="register_page_seo_description">{{ $getOtherItem->register_page_seo_description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Forget Password Heading *</label>
                                            <input type="text" class="form-control" name="forget_password_page_heading"
                                                value="{{ $getOtherItem->forget_password_page_heading }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Forget Password Title *</label>
                                            <input type="text" class="form-control" name="forget_password_page_title"
                                                value="{{ $getOtherItem->forget_password_page_title }}">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Forget Password Seo Description *</label>
                                            <textarea textarea class="form-control" placeholder="Leave a seo description here" id="floatingTextarea2"
                                                style="height: 100px" name="forget_password_page_seo_description">{{ $getOtherItem->forget_password_page_seo_description }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update OtherItem</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
