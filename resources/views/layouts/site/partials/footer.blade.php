<footer id="footer" class="pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-lg-left text-center">
                <div class="copyright">
                    &copy; Copyright <strong class="text-msa">Me Salva Ai</strong>. All Rights Reserved
                </div>
                {{-- <div class="credits">
                    Designed by <a href="http:://mesalvaai.com" class="text-msa">developers Me Salva Aí</a> using bootstrap technology
                </div> --}}
            </div>
            <div class="col-lg-6">
                <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                    <a href="#intro" class="scrollto">Home</a>
                    <a href="#" data-toggle="modal" data-target="#termos-de-uso">Termos de uso</a>
                    <a href="#" data-toggle="modal" data-target="#politicas">Politicas de privacidade</a>
                </nav>
            </div>
        </div>
    </div>
</footer>
@include('layouts.site.partials.termos-de-uso', ['termos' => 'tremos-de-uso'])
@include('layouts.site.partials.politicas', ['termos' => 'politicas'])

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>