-- Migration: adds 'en_attente_paiement' status to amende table
-- Run this in your MySQL database

ALTER TABLE amende 
  MODIFY COLUMN statut ENUM('impayee','en_attente_paiement','payee') DEFAULT 'impayee';

-- Add icon column to notification (optional enrichment)
ALTER TABLE notification 
  ADD COLUMN IF NOT EXISTS ico VARCHAR(10) DEFAULT '🔔' AFTER type;
