@extends('siteadmin.layout.admin_master')
@section('title', 'Living Lectionary | Edit Category')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li class=""><a>Settings</a></li>
                <li class="active"><a>Edit Main Category</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>Edit Category</h5>

                </header>
                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>{!! implode('', $errors->all('<li>:message</li>')) !!}</div>
                @endif
                <div id="div-1" class="accordion-body collapse in body">
                    {!! Form::open(array('url'=>'edit_main_category_submit','class'=>'form-horizontal')) !!}
                    @foreach($edit_main_catg_details as $add_main_catg_det)
                        <div class="form-group">
                            <label for="text1" class="control-label col-md-3">Top Category Name<span
                                        class="text-sub">*</span></label>

                            <div class="col-md-8">
                                <input id="catg_name" placeholder="" name="catg_name" class="form-control" readonly
                                       value="{!!$add_main_catg_det->mc_name!!}" type="text"> <input type="hidden"
                                                                                                     id="catg_id"
                                                                                                     name="catg_id"
                                                                                                     value="{!!$add_main_catg_det->smc_mc_id!!}"/>
                                <input type="hidden" id="main_catg_id" name="main_catg_id"
                                       value="{!!$add_main_catg_det->smc_id!!}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="text1" class="control-label col-md-3">Main Category Name<span
                                        class="text-sub">*</span></label>

                            <div class="col-md-8">
                                <input id="main_catg_name" placeholder="" name="main_catg_name" class="form-control"
                                       value="{!!$add_main_catg_det->smc_name!!}" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" for="text1"> Category Status
                                <label class="sample"></label></label>

                            <div class="col-md-8">
                                <input type="radio" value="1" title="Active" checked="checked" name="catg_status">
                                <label class="sample">Active </label>
                                <input type="radio" value="0" title="Active" name="catg_status"> <label class="sample">Deactive </label></label>
                                <label class="sample"></label></label>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="pass1" class="control-label col-md-3"><span class="text-sub"></span></label>

                            <div class="col-md-8">
                                <button type="submit" class="btn btn-warning btn-sm btn-grad" style="color:#fff">
                                    Update
                                </button>
                                <a href="<?php echo url('manage_main_category/');?>/{!!$add_main_catg_det->smc_mc_id!!}"
                                   class="btn btn-default btn-sm btn-grad" style="color:#000">Cancel</a>

                            </div>

                        </div>
                    @endforeach

                    {!! form::close()!!}
                </div>
            </div>
        </div>

    </div>

@endsection
