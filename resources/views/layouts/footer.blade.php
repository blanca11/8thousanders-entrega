<footer class="footer flex-between">
    <div class="footer__logo">
        <a href="{{ route('home') }}">
          <img src="images/logo.png" alt="logo">
        </a>
        
    </div> 
    <li>
        <a href="{{ route('contacto') }}">Contacto</a> 
    </li>
    <ul class="footer__social">
        <li class="flex-center">
            <a href="" target="_blank">
                <img src="images/instagram.png" alt="instagram">
            </a> 
        </li>
        <li class="flex-center">
            <a href="" target="_blank">
                <img src="images/tiktok.png" alt="ticktok">
            </a>
        </li>
    </ul>
    <!--<p>&copy; {{ date('Y') }} 8thousanders. All rights reserved.</p>-->
</footer>