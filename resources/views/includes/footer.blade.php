<!--required: $get_contact_det, $getanl, $cms_page_title, $get_social_media_url !-->
<!--required: $logodetails, $inverse_logodetails, $theme_list!-->
<?php
$loggedin = false;
if (Session::has('customerid')) {
    $loggedin = true;
    $id = Session::get('customerid');
    $connect = DB::table('nm_member')->where('mem_id', '=', $id)->first();
    $logintype = $connect->mem_logintype;
    $subscribe = Session::get('subscribe');
};
?>

<?php foreach ($get_contact_det as $enquiry_det) {
}?>
<div id="login4" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false"
     style="display:none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Request For Advertisement</h3>
    </div>
    <div id="error_name" style="color:#F00;font-weight:400"></div>
    <div class="modal-body">

        {!! Form::open(array('url'=>'user_ad_ajax','id'=>'uploadform','enctype'=>'multipart/form-data')) !!}
        <div class="form-group">
            <label class="control-label col-lg-2" for="text1">Ad Title<span class="text-sub">*</span></label>

            <div class="col-lg-8">
                <input type="text" class="form-control span5" placeholder="Enter Ad Title" id="ad_title"
                       name="ad_title">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2" for="text1">Ads position<span class="text-sub">*</span></label>

            <div class="col-lg-8">
                <select class="form-control span5" id="ad_pos" name="ad_pos">
                    <option value="0">select position</option>
                    <option value="1">Header right</option>
                    <option value="2">Left side bar</option>
                    <option value="3">Bottom footer</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2" for="text1">Pages<span class="text-sub">*</span></label>

            <div class="col-lg-8">
                <select class="form-control span5" id="ad_pages" name="ad_pages">
                    <option value="0">select any page</option>
                    <option value="1">Home</option>
                    <option value="2">Sports</option>
                    <option value="3">Electronics</option>
                    <option value="4">Flower pot</option>
                    <option value="5">Health</option>
                    <option value="6">Beauty</option>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-2" for="text1">Redirect url<span class="text-sub">*</span></label>

            <div class="col-lg-8">
                <input type="text" class="form-control span5" placeholder="Enter Valid URL" id="ad_url" name="ad_url">
            </div>
        </div>
        <div class="form-group">
            <label for="text1" class="control-label col-lg-2">Upload images <span class="text-sub">*</span></label>

            <div class="col-lg-8">
                <input type="file" name="file" id="file"><label> </label>
            </div>
        </div>
        <br>
        <button type="button" id="upload_add" class="btn btn-success">Upload</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>

    {!! Form::close() !!}
</div>

<div id="footerSection">
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <h5>CONTACT</h5>
                <a href="mailto:contact@livinglectionary.org"><i
                            class="icon-envelope"></i> &nbsp; contact@livinglectionary.org</a>

            <!--a><i class="icon-phone-sign"></i>&emsp;<?php echo $enquiry_det->es_phone1; ?></a>
                <a><i class="icon-phone"></i>&emsp;<?php echo $enquiry_det->es_phone2; ?></a>
                <a href="<?php echo url('contactus'); ?>"><i class="icon-map-marker"></i>&emsp;Contact Us</a>
                <a href="<?php //echo url(''); ?>">&emsp;<?php
            foreach($getanl as $getal)
            {
            echo $getal->sm_analytics_code;
            }
            ?>
                    </a-->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <ul class="fot">
                    <h5>LINKS</h5>
                    <li><a href="<?php echo url('home'); ?>">Home</a></li>
                    <li><a href="<?php echo url('about_us'); ?>">About us</a></li>
                    <?php if(!$loggedin) {?>
                    <li><a href="<?php echo url('join'); ?>">Join</a></li>
                    <?php } ?>
                    <?php if($loggedin && $logintype == \App\Member::MEMBER_LOGIN_CUSTOMER) {?>
                    <li>
                    <a href="<?php echo url('become_a_contributor'); ?>">Contribute</a>
                    </li>
                    <?php } ?>
                    <li><a href="<?php echo url('affirmations'); ?>">Affirmations</a></li>
                    <li><a href="<?php echo url('search'); ?>">Search</a></li>
                    <li><a href="<?php echo url('contributors'); ?>">Contributors</a></li>

                    <?php
                    /*if(isset($cms_page_title)) { foreach($cms_page_title as $cms){ ?>
                    <li><a href="<?php echo url('cms/'.$cms->cp_id); ?>"><?php  echo $cms->cp_title; ?></a></li>
                    <?php } } */
                    ?>
                </ul>
            </div>

        <!--div class="col-md-2  col-sm-6 col-xs-12  socialMedia">
                <h5>MERCHANT LOGIN</h5>
                <a href="<?php echo url('merchant_signup'); ?>">Register</a>/ <a
                        href="<?php echo url('sitemerchant'); ?>" target="_blank"> Login</a><br/>


                <h5>SOCIAL MEDIA </h5>
                <?php if($get_social_media_url){ foreach($get_social_media_url as $social_sttings_url) { } ?>
                <a href="<?php echo $social_sttings_url->sm_fb_page_url; ?>" target="_blank"><img width="24" height="24"
                                                                                                  src="<?php echo url(''); ?>/themes/images/facebook.png"
                                                                                                  title="facebook"
                                                                                                  alt="facebook"/></a>
                <a href="<?php echo $social_sttings_url->sm_twitter_url; ?>" target="_blank"><img width="24" height="24"
                                                                                                  src="<?php echo url(''); ?>/themes/images/twitter.png"
                                                                                                  title="twitter"
                                                                                                  alt="twitter"/></a>
                <a href="<?php echo $social_sttings_url->sm_youtube_url; ?>" target="_blank"><img width="24" height="24"
                                                                                                  src="<?php echo url(''); ?>/themes/images/youtube.png"
                                                                                                  title="youtube"
                                                                                                  alt="youtube"/></a>
                <a href="<?php echo $social_sttings_url->sm_linkedin_url; ?>" target="_blank"><img width="24"
                                                                                                   height="24"
                                                                                                   src="<?php echo url(''); ?>/themes/images/in.png"
                                                                                                   title="linkedin"
                                                                                                   alt="linkedin"/></a>
                <?php } ?>
                </div-->

            <div class="col-md-3  col-sm-6  col-xs-12">
                <h5>LIVING LECTIONARY</h5>
                <p>Subscribe to Living Lectionary to receive the latest news straight to your inbox.</p>
                <button class="sub-but" data-toggle="modal" data-target="#subscribe">Subscribe Here</button>
                <br/>
            </div>

            <div class="col-md-3  col-sm-6 col-xs-12">
                <h5>PAYMENT METHOD</h5>
                <img src="<?php echo url(''); ?>/themes/images/paypal-payment-logo.png">
                <h5>OUR SERVICES</h5>
                <ul>
                    <li><a href="<?php echo url('terms_and_conditions'); ?>">Terms & Conditions</a></li>
                    <li><a href="<?php echo url('privacy_policy'); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo url('faq'); ?>">FAQ</a></li>
                </ul>
            </div>

        </div>

        <br>
        <div class="container">
            <p class="alignR">© <?php echo date("Y"); ?> <?php echo $enquiry_det->es_contactname; ?>, All Rights
                Reserved.</p>
        </div>
    </div><!-- Container End -->
</div>

<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
</div>
<span id="themesBtn"></span>
