# Whispr Platform

Whispr is a modern, secure, and compassionate communication platform designed to provide a safe space for peer support, crisis intervention, and journaling. Built with privacy and user experience at its core, it offers a whisper-quiet interface for those in need.

![Whispr Platform](public/images/icons/icon-512x512.svg)

## Features

- **Peer Chat**: Real-time messaging with **replies**, **reporting**, and visible sender names.
- **Admin Dashboard**: Comprehensive management of Users, Chat Rooms, and Crisis Resources.
- **Crisis Support**: Dynamic access to verified crisis intervention resources.
- **Journaling**: Private, secure journaling to track thoughts and feelings.
- **Authentication**: Secure login via Email and Google OAuth.
- **PWA Support**: Installable on mobile and desktop devices with offline capabilities.
- **Dark Mode**: Native dark mode support for comfortable usage.

## Tech Stack

- **Framework**: [Laravel 12](https://laravel.com)
- **Frontend**: [Blade Templates](https://laravel.com/docs/blade) with [Livewire](https://livewire.laravel.com)
- **Styling**: [Tailwind CSS 4](https://tailwindcss.com) & [Bootstrap](https://getbootstrap.com) (Icons)
- **Bundler**: [Vite](https://vitejs.dev)
- **PWA**: [Vite PWA Plugin](https://vite-pwa-org.netlify.app/)
- **Database**: SQLite (Default) / MySQL

## Getting Started

### Prerequisites

- PHP 8.2 or higher
- Node.js & NPM
- Composer

### Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/yourusername/whispr-platform.git
    cd whispr-platform
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Install Node dependencies**
    ```bash
    npm install
    ```

4.  **Environment Setup**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Database Setup**
    ```bash
    touch database/database.sqlite
    php artisan migrate
    ```

6.  **Build Assets**
    ```bash
    npm run build
    ```

7.  **Run the Application**
    ```bash
    php artisan serve
    ```

    Visit `http://localhost:8000` in your browser.

## PWA Features

This application is a Progressive Web App. You can install it on your device for a native-like experience.
- **Offline Support**: The app caches core assets to load faster and work offline.
- **Installable**: Add to Home Screen on iOS and Android.

## Contributing

1.  Fork the repository.
2.  Create a feature branch (`git checkout -b feature/amazing-feature`).
3.  Commit your changes (`git commit -m 'Add some amazing feature'`).
4.  Push to the branch (`git push origin feature/amazing-feature`).
5.  Open a Pull Request.

## License

This project is licensed under the [MIT License](LICENSE).
