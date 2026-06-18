<div align="center">

# 🎮 Web Application for Video Game Recommendations
**Engineering Thesis Project — University of Rzeszów (2024)**

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)

</div>

---

## 🎓 About the Project
This web application was developed as part of an engineering thesis aimed at delivering personalized video game recommendations. The system integrates with the external **IGDB API** to fetch up-to-date, comprehensive game data. 

The core of the project involves custom recommendation algorithms that analyze user preferences based on their game library and liked titles.

**Author:** Dominik Machnik  
**Institution:** University of Rzeszów, Computer Science

## ⚙️ Key Features
* **📚 Game Library Management:** Users can add video games to their own collection (library) and mark them as liked.
* **🧠 Advanced Recommendation System:** Three independent algorithms designed to match games perfectly to user tastes.
* **🕸️ Similarity Graph:** Ability to manage connection weights in a directed similarity graph, allowing precise relationship tuning between various games and genres.
* **🔄 IGDB API Integration:** Automatic data retrieval directly from the Internet Game Database servers.
* **🔐 Authentication & Accounts:** Secure user registration, login system, and profile management.

## 🧮 Recommendation Algorithms
In accordance with the thesis goals, the application implements three distinct approaches to generating game suggestions:
1. **Game Modes-Based:** An algorithm primarily relying on the user's preferred game modes, supported by genre analysis.
2. **Genres-Based:** An algorithm prioritizing video game genres (e.g., RPG, Shooter) while using game modes as secondary supporting data.
3. **Similarity Graph (Directed Graph):** An advanced algorithm where the vertices represent all available game genres, and the paths/weights define the degree of correlation and custom fit for a specific user.

## 🛠️ Technologies Used
* **Backend:** PHP, [Laravel](https://laravel.com/)
* **Frontend:** Blade Templates, JavaScript / Vite
* **Database:** MySQL
* **External API:** [IGDB (Internet Game Database)](https://api-docs.igdb.com/)
