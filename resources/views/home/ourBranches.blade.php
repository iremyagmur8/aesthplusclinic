@extends('layouts.app')
@section('title','Aesthplusclinic')
@section('desc','')
@section('content')
    <section class="no-padding">
        <!-- Google Map -->
        <div class="map">
            <iframe src="" height="500" style="border:0;" allowfullscreen=""
                    loading="lazy"></iframe>
        </div>
        <!-- end: Google Map -->
    </section>
    <section>
        <div class="container">
            <div class="heading-text heading-line text-center">
                <h4>Team members</h4>
            </div>
            <div class="row team-members team-members-left team-members-shadow m-b-40">
                <div class="col-lg-6">
                    <div class="team-member">

                        <div class="team-desc">
                            <h3>Alea Smith</h3>
                            <span>Software Developer</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                            <div class="align-center">
                                <a class="btn btn-xs btn-slide btn-light" href="#">
                                    <i class="fab fa-facebook-f"></i>
                                    <span>Facebook</span></a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="100">
                                    <i class="fab fa-twitter"></i>
                                    <span>Twitter</span></a>
                                <a class="btn btn-xs btn-slide btn-light" href="#" data-width="118">
                                    <i class="fab fa-instagram"></i>
                                    <span>Instagram</span></a>
                                <a class="btn btn-xs btn-slide btn-light" href="mailto:#" data-width="80">
                                    <i class="icon-mail"></i>
                                    <span>Mail</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
