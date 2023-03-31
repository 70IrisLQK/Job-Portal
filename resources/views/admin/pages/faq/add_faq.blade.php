@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Add New FAQ</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('faqs.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="mb-4">
                                            <label class="form-label">Question *</label>
                                            <textarea class="form-control" placeholder="Leave a question here" id="floatingTextarea2" style="height: 100px"
                                                name="question">{{ old('question') }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Answer *</label>
                                            <textarea id="default" name="answer">{{ old('answer') }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Add FAQ</button>
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
