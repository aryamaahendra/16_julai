@if (session()->has('alert'))
   <div class="session-alert hidden">
      <input type="hidden" name="error" value="{{ session('alert')['error'] }}">
      <input type="hidden" name="message" value="{{ session('alert')['message'] }}">
   </div>
@endif
