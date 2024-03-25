<form action="{{ route('frontend.request-services.store') }}" method="post" class="row">
    @csrf
    <div class="input-field col-md-6">
        <i class="twi-user2"></i>
        <input class="required" type="text" name="name" value="{{ old('name') }}" required placeholder="الاسم" />
    </div>
    <div class="input-field col-md-6">
        <i class="twi-user2"></i>
        <input class="required" type="text" name="phone" value="{{ old('phone') }}" required placeholder="رقم الهاتف" />
    </div>
    <div class="input-field col-md-6">
        <i class="twi-envelope2"></i>
        <input class="required" type="email" name="email" value="{{ old('email') }}" required placeholder="البريد الالكتروني" />
    </div>
    <div class="input-field col-md-6">
        <i class="twi-envelope2"></i>
        <input class="required" type="password" name="password" required placeholder="كلمة المرور" />
    </div>
    <div class="input-field col-md-6">
        <i class="twi-map-marker-alt2"></i>
        <input type="text" name="place" value="{{ old('place') }}" required placeholder="المكان" />
    </div>
    <div class="input-field col-md-6">
        <select class="required" name="service_id" required>
            <option disabled selected>الخدمة</option>
            @foreach (App\Models\Service::get() as $service)
                <option value="{{ $service->id }}"
                    {{ old('service_id', '') === (string) $service->id ? 'selected' : '' }}>{{ $service->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="input-field col-md-12">
        <i class="twi-comment-lines2"></i>
        <textarea class="required" name="message" required placeholder="تفاصيل أضافية">{{ old('message') }}</textarea>
    </div>
    <div class="input-field col-md-12">
        <button type="submit" class="qu_btn">أرسال</button>
        <div class="con_message"></div>
    </div>
</form>
