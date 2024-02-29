@extends('frontend.layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="jumbotron" style="margin-top: 30px !important;">
                <h1>Contact Here</h1>
                <div class="container">
                    <form id="contact-form" method="post" action="{{ route('contact.store') }}" role="form">
                        @csrf

                        <div class="messages">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to_address">To Address *</label>
                                    <textarea id="to_address" name="to_add" class="form-control" placeholder="To Address *" rows="4" required="required" data-error="Please, provide the recipient's address."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from_address">Return Address *</label>
                                    <textarea id="from_address" name="from_add" class="form-control" placeholder="Return Address *" rows="4" required="required" data-error="Please, provide your return address."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_message">Message *</label>
                                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="text-muted"><strong>*</strong> These fields are required.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary d-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
