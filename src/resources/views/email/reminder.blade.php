{{ $reservation->user->name }}様<br>
<br>
いつも「Rese」ご利用していただきありがとうございます。<br>
ご予約していただいた来店日が本日となりましたので、再度ご連絡させていただきます。<br>
<br>
＜ご予約情報＞<br>
店名： {{$reservation->shop->shop_name}}<br>
ご予約日時： {{ $reservation->reservation_datetime}}<br>
ご来店人数： {{ $reservation->number_of_people}}<br>
<br>
ご来店お待ちしております。