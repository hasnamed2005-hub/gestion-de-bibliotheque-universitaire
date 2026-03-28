ALTER TABLE emprunt MODIFY COLUMN statut ENUM('actif','rendu','retard','en_attente') DEFAULT 'actif';
