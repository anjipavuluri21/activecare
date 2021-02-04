  <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">أدخل لحسابك</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body modal-body-popup">
                        <form method="post" id="login_form">
                            <div class="form-group">
                                <label for="login-email">البريد الإلكتروني</label>
                                <input type="email" name="email" required class="form-control" id="login-email" placeholder="البريد الإلكتروني">
                            </div>
                            <div class="form-group">
                                <label for="login-password">كلمه السر</label>
                                <input type="password" name="password" class="form-control" id="login-password" placeholder="كلمه السر" required="Please Enter Password">
                            </div>
                            <div id="output">
                                
                                
                            </div>
                            <button type="submit" name="login" class="btn btn-primary" id="loginbutton">تسجيل الدخول</button>
                            <p>&nbsp;</p>
                            <hr>
                            <p>&nbsp;</p>					<p class="mb-0">لا يوجد لديك حساب؟</p>
                            <p class="mb-0"><strong><a href="#" data-toggle="modal" data-target="#register-modal" data-dismiss="modal">أنشئ حسابك الآن</a></strong></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>	