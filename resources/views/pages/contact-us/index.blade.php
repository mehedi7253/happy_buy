@extends('pages.includes.app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto mt-5 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Contact With Us</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('contact-us.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <label> Email Address: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email Address" value="{{ old('email') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <label>Phone Number: <sup class="text-danger font-weight-bold">*</sup></label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Your Phone Number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <label>Message: <sup class="text-danger font-weight-bold">*</sup></label>
                                     <textarea class="form-control @error('message') is-invalid @enderror" name="message" id="application"></textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                   <input type="submit" name="btn" class="btn btn-success col-md-6 rounded" value="Send Message">
                                 </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('application',
            {
                height:300,
                resize_enabled:true,
                wordcount: {
                    showParagraphs: false,
                    showWordCount: true,
                    showCharCount: true,
                    countSpacesAsChars: true,
                    countHTML: false,
                    maxCharCount: 20}
            });
    </script>

    @endsection
