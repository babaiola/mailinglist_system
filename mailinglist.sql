-- 
-- Struttura della tabella `mailinglist`
-- 

CREATE TABLE `mailinglist_ing` (
  `indirizzo` varchar(100) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dump dei dati per la tabella `mailinglist`
-- 

INSERT INTO `mailinglist_ing` (`indirizzo`) VALUES 
('primamail'),
('ultimamail');
