<!-- @component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent -->
@component('mail::message')
# Consultation Request Received

Dear {{ $data['name'] }},

Thank you for reaching out for a free consultation. Here are the details we received:

- **Email**: {{ $data['email'] }}
- **Phone Number**: {{ $data['phone_number'] }}
- **Last Education**: {{ $data['last_education'] }}
- **Apply For**: {{ $data['apply_for'] }}

We will contact you back soon.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
