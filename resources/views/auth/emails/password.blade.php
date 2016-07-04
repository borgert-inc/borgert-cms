@lang('auth.email.password.description') <a href="{{ $link = url('auth/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
