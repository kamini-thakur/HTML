<div class="Polaris-Banner Polaris-Banner--statusSuccess" tabindex="0" role="status" aria-live="polite" aria-labelledby="Banner4Heading" aria-describedby="Banner4Content">
  <div class="Polaris-Banner__Ribbon"><span class="Polaris-Icon Polaris-Icon--colorGreenDark Polaris-Icon--hasBackdrop"><svg class="Polaris-Icon__Svg" viewBox="0 0 20 20"><g fill-rule="evenodd"><circle fill="currentColor" cx="10" cy="10" r="9"></circle><path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m2.293-10.707L9 10.586 7.707 9.293a1 1 0 1 0-1.414 1.414l2 2a.997.997 0 0 0 1.414 0l4-4a1 1 0 1 0-1.414-1.414"></path></g></svg></span></div>
  <div>
    <div class="Polaris-Banner__Heading" id="Banner4Heading">
      <p class="Polaris-Heading">{{ session('successMsg') }}</p>
      @if (session('successMsg') == "Product created successfully")
      	<p><a href="/install_instructions">view installation instructions</a></p>
      @endif
    </div>
  </div>
</div>