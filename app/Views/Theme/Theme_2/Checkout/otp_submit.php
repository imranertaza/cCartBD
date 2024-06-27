<section class="main-container checkout" id="tableReload">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center"></div>
            <?php //echo newSession()->orderOtp;?>
            <div class="col-md-6 border p-5 text-center align-self-center">
                <div class="btn-area m-l-r-27 m-b-40 text-center">
                    <h4>Verification code</h4>
                    <h6>We have sent a verification code to your mobile number</h6>
                    <h6 class="v-numb mt-3"><?php echo  newSession()->payment_phone; ?></h6>
                    <div style="margin-top: 12px" id="message">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                    <form action="<?php echo base_url('otpCheck'); ?>" method="post">
                        <div class="digit-group mt-4">
                            <input type="number" id="digit-1" name="otp[]" data-next="digit-2" required/>
                            <input type="number" id="digit-2" name="otp[]" data-next="digit-3" data-previous="digit-1" required/>
                            <input type="number" id="digit-3" name="otp[]" data-next="digit-4" data-previous="digit-2" required/>
                            <input type="number" id="digit-4" name="otp[]" data-next="digit-5" data-previous="digit-3" required/>
                        </div>
                        <p class="mt-4 re-get-otp">Don’t get the code? <a href="<?php echo base_url('resend_otp')?>" class="re-send">Resent OTP</a></p>

                        <button class="btn btn-secondary  w-100 mt-3" id="inact_sub">Submit</button>
                        <button class="btn btn-success  w-100 mt-3" id="act_sub">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 text-center"></div>
        </div>
    </div>
</section>