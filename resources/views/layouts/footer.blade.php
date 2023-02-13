<footer class="footer footer-black  footer-white" style="margin-top: auto">
    <div class="container-fluid">
        <div class="row">
            <nav class="footer-nav">
                <ul>
                    <li>
                        <a href="" target="_blank">{{ __('Appliances Ordering Management System') }}</a>
                    </li>
                    {{-- <li>
                        <a href="" target="_blank">{{ __('Ordering') }}</a>
                    </li>
                    <li>
                        <a href="" target="_blank">{{ __('Management') }}</a>
                    </li>
                    <li>
                        <a href="" target="_blank">{{ __('System') }}</a>
                    </li> --}}
                </ul>
            </nav>
            <div class="credits ml-auto">
                <span class="copyright">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>{{ __(', made with ') }}<i class="fa fa-heart heart"></i>{{ __(' by ') }}<a class="@if(Auth::guest()) text-white @endif" href="#" target="_blank">{{ __('OhMyBoss') }}</a>
                </span>
            </div>
        </div>
    </div>
</footer>
