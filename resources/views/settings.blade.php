@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="page-header page-header-small clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image:url('../assets/img/bg8.jpg');">
            </div>
            <div class="container">
                <div class="photo-container">
                    <img src="../assets/img/.jpg" alt="">
                </div>
                <h1 class="title">Pengaturan</h1>
                <p class="category">Setelan Situs Web WANAGIS</p>

            </div>
        </div>
        <div class="section">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col col-md-8">
                            <div class="card">
                                <h3 class="title text-center"> Pengaturan Judul dan Nama Website</h3>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="webtitle">Web Title</label>
                                                <input type="" class="form-control" id="inputwebtitle"
                                                    placeholder="Web Title">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="webname">Web Name</label>
                                                <input type="" class="form-control" id="inputwebname"
                                                    placeholder="Web Name">
                                            </div>
                                        </div>
                                        <button id="submit" type="submit"
                                            class="btn btn-success btn-round">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-4">
                            <div class="card">
                                <h3 class="title text-center"> Pengaturan Logo</h3>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="logo">Logo</label>
                                                <input type="" class="form-control" id="inputlogo"
                                                    placeholder="Logo">
                                            </div>
                                        </div>
                                        <button id="submit-logo" type="submit"
                                            class="btn btn-success btn-round ">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
