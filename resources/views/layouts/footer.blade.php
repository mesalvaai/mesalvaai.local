<!-- ***** Contact Us Area Start ***** -->
<section class="footer-contact-area section_padding_100 clearfix" id="contato">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow animated bounceInDown" data-wow-delay="0.4s">
                <!-- Heading Text  -->
                <div class="section-heading">
                    <h2>Nosso equipe esta a disposição!</h2>
                    <div class="line-shape"></div>
                </div>
                <div class="footer-text">
                    <p>Entre em contato con-nosco para mais informaçoes!</p>
                </div>
                <div class="address-text">
                    <p><span>Endereço:</span> BR-101, km 197, Capoeiruçu Caixa Postal 18, Cachoeira Bahia,</p>
                </div>
                <div class="phone-text">
                    <p><span>Telefone:</span> +55 (75) 99243-8993</p>
                </div>
                <div class="email-text">
                    <p><span>E-mail:</span> faleconosco@mesalvaai.com</p>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Form Start-->
                <div class="contact_from">
                    <form action="#" method="post">
                        <!-- Message Input Area Start -->
                        <div class="contact_input_area">
                            <div class="row">
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Seu Nome" required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Seu E-mail" required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Sua Mesagem *" required></textarea>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <button type="submit" class="btn submit-btn">Me salva ai</button>
                                </div>
                            </div>
                        </div>
                        <!-- Message Input Area End -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ***** Footer  Start ***** -->
<footer class="footer-social-icon text-center section_padding_70 clearfix">

    <div class="footer-text">
        <h2 class=" wow animated infinite bounce" data-wow-delay="0.4s">ME SALVA AI</h2>
    </div>
    <!-- social icon-->
    <div class="footer-social-icon">
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
    </div>
    <div class="footer-menu">
        <nav>
            <ul>
                <li><a href="#about">Sobre nós</a></li>
                <li><a href="#">Terminos de uso</a></li>
                <li><a href="#">Politicas de privacidade</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
    </div>
    <!-- Foooter Text-->
    <div class="copyright-text">
        <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
        <p>Copyright ©2018 MSA. Desenhado por <a href="http://edessoft.com.br" target="_blank">EDESSOFT</a></p>
    </div>
</footer>
<!-- ***** Footer Area Start ***** -->

<!-- Sidebar Right -->
<div class="modal fade right" id="sidebar-right" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="fa fa-users"></i> <b class="color-blue"> Me Salva Bolsa</b>
                    </div>
                    <div class="card-content">
                        <div class="mb-3"></div>
                        <form class="form-horizontal" action="{{ url('cursos') }}" method="get" target="_parent">
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty">
                                    <select name="estado" class="form-control">
                                        <option value="">Selecione um estado</option>
                                        <option value="BA">BA</option>
                                        <option value="MG">MG</option>
                                        <option value="SP">SP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty">
                                    <select name="cidade" class="form-control">
                                        <option value="">Selecione uma cidade</option>
                                        <option value="Cachoeira">Cachoeira</option>
                                        <option value="Lavras">Lavras</option>
                                        <option value="SP">Saou Paulo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty">
                                    <input class="form-control" type="text" name="curso"  placeholder="CURSO">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-button">
                                    <button class="btn btn-primary w-100" type="submit">BUSACAR BOLSA DE ESTUDO</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>