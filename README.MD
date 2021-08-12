[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]

<p align="center">

  <h3 align="center">PayMe API Demo</h3>

  <p align="center">
    <a href="https://github.com/apphk/payme-api-demo"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/apphk/payme-api-demo">View Demo</a>
    ·
    <a href="https://github.com/apphk/payme-api-demo/issues">Report Bug</a>
    ·
    <a href="https://github.com/apphk/payme-api-demo/issues">Request Feature</a>
  </p>
</p>


<!-- ABOUT THE PROJECT -->
## About The Project

[![PayMe API Flow][payme-flow]](https://developers.payme.hsbc.com.hk/get-started)

### Built With

* [PHP](https://www.php.net/)



## Getting Started

### Prerequisites

Get your PayMe business account ready and Receive your API credentials
* API Credentials consist of 4 parameters
    ```text
    Client ID 
    Secret Key
    Signing Key ID
    Signing Key
    ```

### Installation

1. Get the PayMe API package 
2. Clone this repo 
    ```sh
    git clone https://github.com/apphk/payme-api-demo
    ```
3. Rename .env.example to .env and update the variables with your credentials
    ```sh
    CLIENT_ID = ''
    CLIENT_SECRET = ''
    SIGNING_KEY_ID = ''
    SIGNING_KEY = ''
   ...
    ```
4. Install packages
   ```sh
   composer install
   ```
5. Run example.php 
   ```sh
   php example.php 
   ```

## Usage

- Init api client
    ```php
    $client = new ApiClient($clientId, $clientSecret, $signingKeyId, $signingKey, $apiUrl);
    ```
- Send payment request
    ```php
    $response = $client->payment()->requests($request);
    ```
- Get payment request status
    ```php
    $response = $client->payment()->status($paymentRequestId);
    ```  
- Cancel payment request
    ```php
    $response = $client->payment()->cancel($paymentRequestId);
    ```
- Transactions
    ```php
    $response = $client->payment()->transactions();
    ```
- Get transaction by id
    ```php
    $response = $client->payment()->transaction($transactionId);
    ```
- Refunds
    ```php
    $response = $client->payment()->refunds($transactionId, $refundsRequest);
    ```
  
_For more api details, please refer to the [Documentation](https://developers.payme.hsbc.com.hk/get-started)_



<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/apphk/payme-api-demo/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<!-- CONTACT -->
## Contact

Project team: [https://hksay.com](https://hksay.com)


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/apphk/payme-api-demo.svg?style=for-the-badge
[contributors-url]: https://github.com/apphk/payme-api-demo/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/apphk/payme-api-demo.svg?style=for-the-badge
[forks-url]: https://github.com/apphk/payme-api-demo/network/members
[stars-shield]: https://img.shields.io/github/stars/apphk/payme-api-demo.svg?style=for-the-badge
[stars-url]: https://github.com/apphk/payme-api-demo/stargazers
[issues-shield]: https://img.shields.io/github/issues/apphk/payme-api-demo.svg?style=for-the-badge
[issues-url]: https://github.com/apphk/payme-api-demo/issues
[payme-flow]: https://assets.paymebiz.hsbc.com.hk/public-web-content/public-web-content/drag-dev-portal/img/pmtapi-diagram.png