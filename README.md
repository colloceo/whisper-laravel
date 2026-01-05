# Whispr Platform

Whispr is a modern, secure, and compassionate communication platform designed to provide a safe space for peer support, crisis intervention, and holistic mental wellness. Built with privacy and user experience at its core, it offers a "whisper-quiet" interface tailored for those seeking comfort and connection.

![Whispr Platform](public/images/icons/icon-512x512.svg)

## Features

- **Peer Chat**: Real-time messaging with **replies**, **reporting**, and AI-assigned **Anonymous Usernames** (e.g., "Calm Koala") to ensure complete privacy.
- **Mood Tracking & Visualization**: Interactive **Chart.js** integration to visualize your weekly emotional rhythm, allowing you to identify trends and progress over time.
- **AI Integration**:
    -   **Daily Affirmations**: Personalized positive messages generated based on your recent mood trends.
    -   **Cognitive Reframing**: Advanced AI-powered reframing that helps transform negative thoughts into constructive, balanced perspectives within your journal.
    -   **Anonymous Identities**: Creative, AI-generated animal/nature-themed usernames for every member.
- **Journaling**: A private, secure space to track thoughts and feelings, enhanced with AI insights.
- **Crisis Support**: Instant access to a verified directory of local and international crisis intervention resources (Hotlines, Websites, Chat Text).
- **Admin Dashboard**: Comprehensive management suite for overseeing Users (Promote/Delete), Chat Rooms (CRUD), and Crisis Resource data.
- **Donation Integration**: Seamless **PayPal** integration for users who wish to support the platform's mission.
- **PWA Support**: A fully installable Progressive Web App (iOS/Android/Desktop) with offline capabilities and native-like performance.
- **Adaptive UI**: A premium, mobile-first design system featuring:
    -   **Dynamic Theming**: Full Light/Dark mode transitions with persistent preferences.
    -   **Optimized Mobile Navigation**: Fixed bottom navigation bar with "Safe Zone" layouts to prevent content cut-off on mobile devices.
    -   **Responsive Layouts**: High-end glassmorphism aesthetics and smooth transitions powered by SCSS.

## Tech Stack

- **Framework**: [Laravel 12](https://laravel.com)
- **Frontend**: [Blade Templates](https://laravel.com/docs/blade) with [Livewire 3](https://livewire.laravel.com)
- **Styling**: [Tailwind CSS 4](https://tailwindcss.com) & **SCSS**
- **Visualization**: [Chart.js](https://www.chartjs.org/)
- **Bundler**: [Vite](https://vitejs.dev)
- **AI Service**: Google Gemini API
- **Payments**: PayPal SDK
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
    *Add your `GOOGLE_CLIENT_ID`, `GOOGLE_CLIENT_SECRET`, `GEMINI_API_KEY`, and `PAYPAL_CLIENT_ID` to .env*

5.  **Database Setup**
    ```bash
    touch database/database.sqlite
    php artisan migrate --seed
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
- **Auto-Update**: Built-in update detection for the latest features.

## Contributing

1.  Fork the repository.
2.  Create a feature branch (`git checkout -b feature/amazing-feature`).
3.  Commit your changes (`git commit -m 'Add some amazing feature'`).
4.  Push to the branch (`git push origin feature/amazing-feature`).
5.  Open a Pull Request.

## License

This project is licensed under the [MIT License](LICENSE).
