<div class="materialContainer">
    <div class="overbox">
        <div class="material-button alt-2"><span class="shape"></span></div>

        <div class="title">REGISTER</div>
        <div class="input">
            <label for="regname">Username</label>
            <input type="text" value="{{$getEmail($user)}}" name="regname" id="regname">
            <span class="spin"></span>
        </div>
        <div class="input">
            <label for="regpass">Password</label>
            <input value="{{$getPassword($user)}}" type="text" name="regpass" id="regpass">
            <span class="spin"></span>
        </div>
        <div class="input">
            <label for="regpass">Password</label>
            <input value="{{$getAge($user)}}" type="text" name="regpass" id="regpass">
            <span class="spin"></span>
        </div>
        <div class="button">
            <button><span>NEXT</span></button>
        </div>
        {{$slot}}{{$text}}
    </div>
</div>
