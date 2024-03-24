<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
  xmlns="http://www.w3.org/1999/xhtml"
  xmlns:v="urn:schemas-microsoft-com:vml"
  xmlns:o="urn:schemas-microsoft-com:office:office"
>
  <head>
    <!--[if gte mso 9]>
      <xml>
        <o:OfficeDocumentSettings>
          <o:AllowPNG />
          <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
      </xml>
    <![endif]-->

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="date=no" />
    <meta name="format-detection" content="address=no" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="x-apple-disable-message-reformatting" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
      rel="stylesheet"
    />

    <title>Verify</title>
  </head>

  <body
    style="
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background: #f5f5fd;
    "
  >
    <center>
      <table
        width="100%"
        border="0"
        cellspacing="0"
        cellpadding="0"
        style="background: #f5f5fd"
      >
        <tr>
          <td align="center">
            <table width="690" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td style="padding: 35px">
                  <table
                    width="100%"
                    border="0"
                    cellspacing="0"
                    cellpadding="0"
                  >
                    <tr>
                      <td style="border-radius: 8px" bgcolor="#ffffff">
                        <table
                          width="100%"
                          border="0"
                          cellspacing="0"
                          cellpadding="0"
                        >
                          <tr>
                            <td style="text-align: center">
                              <a href="#" target="_blank">
                                <img
                                  src="{{ asset('/sobatklik-email/logo.webp') }}"
                                  border="0"
                                  alt="Logo"
                                  width="175px"
                                  style="margin-top: 32px"
                                />
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td
                              style="
                                font-size: 20px;
                                color: #000;
                                min-width: auto !important;
                                font-weight: 500;
                                padding: 32px 32px 0;
                              "
                            >
                              Permintaan Verifikasi Kode - Sobat Klik📮
                            </td>
                          </tr>

                          <tr>
                            <td
                              style="
                                font-size: 14px;
                                color: #14142b;
                                min-width: auto !important;
                                line-height: 20px;
                                padding: 32px;
                              "
                            >
                              Anda menerima email ini karena Anda telah
                              mendaftar di situs kami.
                              <br />
                              <br />
                              Saat ini pengguna
                              <span style="font-weight: 600">John Doe</span>
                              sedang melakukan aktivitas login diluar radius.
                              Berikut merupakan kode verifikasi pengguna :
                              <br />
                              <br />
                              <h2
                                style="
                                  font-size: 32px;
                                  font-weight: 500;
                                  text-align: center;
                                  margin-bottom: 0px;
                                "
                              >
                                {{ $verificationCode }}
                              </h2>
                            </td>
                          </tr>

                          <tr>
                            <td
                              style="
                                font-size: 14px;
                                color: #14142b;
                                min-width: auto !important;
                                line-height: 20px;
                                padding: 0 32px 32px;
                              "
                            >
                              Atau kamu dapat melakukan pengecekan lokasi login,
                              melalui tombol berikut
                              <br />
                              <br />
                              <div style="text-align: center">
                                <a
                                  href="#"
                                  target="_blank"
                                  style="
                                    color: #ffffff;
                                    background: #9a8de7;
                                    border: 1px solid #9a8de7;
                                    border-radius: 8px;
                                    display: inline-block;
                                    margin-top: 8px;
                                    padding: 12px 22px;
                                    text-decoration: none;
                                  "
                                >
                                  Lihat Peta
                                </a>
                              </div>

                              <br />
                              Ini adalah email yang dibuat secara otomatis,
                              mohon jangan membalas email ini. Jika Anda
                              menghadapi ada masalah, silakan hubungi kami di
                              <a
                                href="mailto:help@sobatklik.com"
                                style="color: #9a8de7"
                                >help@sobatklik.com</a
                              >
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>

                    <tr>
                      <td
                        style="
                          font-size: 12px;
                          color: #b2bec3;
                          min-width: auto !important;
                          line-height: 12px;
                          text-align: center;
                          padding-top: 42px;
                        "
                      >
                        Copyright © 2024
                        <a
                          href="#"
                          target="_blank"
                          style="text-decoration: none; color: #9a8de7"
                          >Sobat Klik</a
                        >
                        All rights reserved.
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </center>
  </body>
</html>
