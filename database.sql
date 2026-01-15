
-- tables creating
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL CHECK (role IN ('sportif', 'coach')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE coaches (
    id SERIAL PRIMARY KEY,
    user_id INT UNIQUE NOT NULL,
    discipline VARCHAR(100) NOT NULL,
    description TEXT,
    experience INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE seances (
    id SERIAL PRIMARY KEY,
    coach_id INT NOT NULL,
    titre VARCHAR(150) NOT NULL,
    description TEXT,
    date_seance TIMESTAMP NOT NULL,
    FOREIGN KEY (coach_id) REFERENCES coaches(id) ON DELETE CASCADE
);

CREATE TABLE reservations (
    id SERIAL PRIMARY KEY,
    sportif_id INT NOT NULL,
    seance_id INT NOT NULL,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sportif_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (seance_id) REFERENCES seances(id) ON DELETE CASCADE,
    UNIQUE (sportif_id, seance_id)
);

-- inserting fake data
INSERT INTO users (nom, email, mot_de_passe, role) VALUES
('Ahmed Coach', 'ahmed.coach@mail.com', '$2y$10$abcdefghijklmnopqrstuv', 'coach'),
('Sara Coach', 'sara.coach@mail.com', '$2y$10$abcdefghijklmnopqrstuv', 'coach'),
('Youssef Sportif', 'youssef.sportif@mail.com', '$2y$10$abcdefghijklmnopqrstuv', 'sportif'),
('Imane Sportif', 'imane.sportif@mail.com', '$2y$10$abcdefghijklmnopqrstuv', 'sportif'),
('Omar Sportif', 'omar.sportif@mail.com', '$2y$10$abcdefghijklmnopqrstuv', 'sportif');

INSERT INTO coaches (user_id, discipline, description, experience) VALUES
(1, 'Fitness', 'Coach fitness spécialisé en remise en forme', 5),
(2, 'Boxe', 'Coach boxe pour débutants et intermédiaires', 8);

INSERT INTO seances (coach_id, titre, description, date_seance) VALUES
(1, 'Fitness Matin', 'Séance cardio et renforcement musculaire', '2026-02-01 09:00:00'),
(1, 'Fitness Soir', 'Séance full body intensive', '2026-02-01 18:00:00'),
(2, 'Boxe Débutant', 'Bases de la boxe anglaise', '2026-02-02 17:00:00'),
(2, 'Boxe Avancé', 'Techniques avancées et sparring', '2026-02-03 19:00:00');

INSERT INTO reservations (sportif_id, seance_id) VALUES
(3, 1),
(3, 3),
(4, 2),
(4, 4),
(5, 1);
