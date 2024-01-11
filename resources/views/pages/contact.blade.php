@extends('layout/base',['title'=>'contact'])

@section('content')

<!-- Contact Start -->
<div class="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info">
                    <h2>Notre bureau</h2>
                    <h3><i class="fa fa-map-marker"></i>{{config('company.address')}}</h3>
                    <h3><i class="fa fa-envelope"></i>{{config('company.mail')}}</h3>
                    <h3><i class="fa fa-phone"></i>{{format_phone_number(config('company.contact1'))}}</h3>
                    <h3><i class="fa fa-phone"></i>{{format_phone_number(config('company.contact2'))}}</h3>
                    <div class="social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-info">
                    <h2>Notre magasin</h2>
                    <h3><i class="fa fa-map-marker"></i>{{config('company.address')}}</h3>
                    <h3><i class="fa fa-envelope"></i>{{config('company.mail')}}</h3>
                    <h3><i class="fa fa-phone"></i>{{format_phone_number(config('company.contact1'))}}</h3>
                    <h3><i class="fa fa-phone"></i>{{format_phone_number(config('company.contact2'))}}</h3>
                    <div class="social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact-form">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name" />
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                        </div>
                        <div><button class="btn" type="submit">Envoyer le message</button></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63658.25591625429!2d15.22112355775992!3d-4.289744847466294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a6a32ac441bb83b%3A0xab3deababe7de443!2sBrazzaville%2C%20R%C3%A9publique%20du%20Congo!5e0!3m2!1sfr!2scm!4v1704895565044!5m2!1sfr!2scm" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection