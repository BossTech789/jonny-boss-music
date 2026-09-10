<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $campaign->subject }}
    </title>

</head>

<body
    style="
        margin:0;
        padding:0;
        background:#f4f4f4;
        font-family:Arial, Helvetica, sans-serif;
        color:#111111;
    "
>

    <table
        width="100%"
        cellpadding="0"
        cellspacing="0"
        border="0"
        style="background:#f4f4f4; padding:40px 15px;"
    >

        <tr>

            <td align="center">

                <table
                    width="100%"
                    cellpadding="0"
                    cellspacing="0"
                    border="0"
                    style="
                        max-width:650px;
                        background:#ffffff;
                        border-radius:16px;
                        overflow:hidden;
                    "
                >

                    {{-- HEADER --}}

                    <tr>

                        <td
                            style="
                                padding:35px 30px;
                                text-align:center;
                                background:#000000;
                                color:#ffffff;
                            "
                        >

                            <h1
                                style="
                                    margin:0;
                                    font-size:28px;
                                    font-weight:800;
                                "
                            >
                                JONNY BOSS
                            </h1>

                            <p
                                style="
                                    margin:8px 0 0;
                                    font-size:13px;
                                    letter-spacing:2px;
                                    color:#cccccc;
                                "
                            >
                                OFFICIAL NEWSLETTER
                            </p>

                        </td>

                    </tr>


                    {{-- CONTENT --}}

                    <tr>

                        <td
                            style="
                                padding:40px 35px;
                            "
                        >

                            {{-- Newsletter title --}}

                            <h2
                                style="
                                    margin:0 0 20px;
                                    font-size:30px;
                                    line-height:1.2;
                                    font-weight:800;
                                "
                            >
                                {{ $campaign->title }}
                            </h2>


                            {{-- Greeting --}}

                            <p
                                style="
                                    margin:0 0 20px;
                                    font-size:16px;
                                    line-height:1.7;
                                "
                            >

                                @if($subscriber->name)

                                    Hello {{ $subscriber->name }},

                                @else

                                    Hello,

                                @endif

                            </p>


                            {{-- Newsletter message --}}

                            <div
                                style="
                                    font-size:16px;
                                    line-height:1.8;
                                    color:#333333;
                                "
                            >

                                {!! nl2br(e($campaign->content)) !!}

                            </div>


                            {{-- Optional website button --}}

                            <div
                                style="
                                    margin-top:35px;
                                    text-align:center;
                                "
                            >

                                <a
                                    href="{{ url('/') }}"
                                    style="
                                        display:inline-block;
                                        padding:14px 28px;
                                        background:#000000;
                                        color:#ffffff;
                                        text-decoration:none;
                                        border-radius:8px;
                                        font-weight:700;
                                    "
                                >
                                    Visit Jonny Boss
                                </a>

                            </div>

                        </td>

                    </tr>


                    {{-- FOOTER --}}

                    <tr>

                        <td
                            style="
                                padding:30px 35px;
                                background:#f7f7f7;
                                text-align:center;
                                border-top:1px solid #eeeeee;
                            "
                        >

                            <p
                                style="
                                    margin:0 0 10px;
                                    font-size:13px;
                                    color:#777777;
                                    line-height:1.6;
                                "
                            >
                                You are receiving this email because
                                you subscribed to the Jonny Boss newsletter.
                            </p>


                            {{-- PERSONAL UNSUBSCRIBE LINK --}}

                            <p
                                style="
                                    margin:15px 0;
                                "
                            >

                                <a
                                    href="{{ route('newsletter.unsubscribe', ['token' => $subscriber->unsubscribe_token]) }}"
                                    style="
                                        font-size:13px;
                                        color:#555555;
                                        text-decoration:underline;
                                    "
                                >
                                    Unsubscribe from this newsletter
                                </a>

                            </p>


                            <p
                                style="
                                    margin:20px 0 0;
                                    font-size:12px;
                                    color:#999999;
                                "
                            >
                                © {{ date('Y') }} Jonny Boss.
                                All rights reserved.
                            </p>

                        </td>

                    </tr>

                </table>

            </td>

        </tr>

    </table>

</body>

</html>
