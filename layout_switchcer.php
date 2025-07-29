<!--start switcher-->
<button class="btn btn-info position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2 waves-effect" style="z-index: -1;" 
  type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
  <i class="material-icons-outlined">tune</i>
</button>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
  <div class="offcanvas-header border-bottom h-70">
    <div class="">
      <h5 class="mb-0">Theme Customizer</h5>
      <p class="mb-0">Customize your theme</p>
    </div>
    <a href="javascript:;" class="primary-menu-close" data-bs-dismiss="offcanvas">
      <i class="material-icons-outlined">close</i>
    </a>
  </div>
  <div class="offcanvas-body">
    <div>
      <p>Theme variation</p>
      <div class="row g-3">
        <div class="col-6 col-xl-6">
          <input type="radio" class="btn-check" name="theme-options" id="BlueTheme" checked>
          <label
            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4  waves-effect"
            for="BlueTheme">
            <span class="material-icons-outlined">contactless</span>
            <span>Blue</span>
          </label>
        </div>
        <div class="col-12 col-xl-6">
          <input type="radio" class="btn-check" name="theme-options" id="LightTheme">
          <label
            class="btn btn-outline-secondary d-flex flex-column gap-1 align-items-center justify-content-center p-4  waves-effect"
            for="LightTheme">
            <span class="material-icons-outlined">light_mode</span>
            <span>Light</span>
          </label>
        </div>

      </div><!--end row-->

    </div>
  </div>
</div>
<!--start switcher-->