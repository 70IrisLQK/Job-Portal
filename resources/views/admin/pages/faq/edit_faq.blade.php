@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update FAQ</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('faqs.update', [$getFAQById->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="mb-4">
                                            <label class="form-label">Question *</label>
                                            <textarea class="form-control" placeholder="Leave a question here" id="floatingTextarea2" style="height: 100px"
                                                name="question">{{ $getFAQById->question }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Answer *</label>
                                            <textarea id="default" name="answer">{{ $getFAQById->answer }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update FAQ</button>
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
