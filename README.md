# acupuncture_website

1/ Tuto pour MVC : 
Partie 1 -> http://fredods.com/creer-votre-site-avec-smarty-en-mvc-partie-1/
Partie 2 -> http://fredods.com/creer-votre-site-avec-smarty-partie-2/


2/ Compte rendu des validations :
- Validation pour le CSS :
Tester avec https://jigsaw.w3.org/css-validator/validator niveau 3
Aucune erreur constatée

- Validation de l'accessibilité :
Tester avec TotalValidatorBasic :  HTML validation: auto-detect et Accessibility validation : WCAG 2.0 AAA
 Erreur "spelling mistakes" : de nombreux mots inconnus tels que "Lyon" ou "Login"
 Erreur E009 "Invalid characters found in the 'href' attribute's value starting at character: 6" : contenu dans les articles du flux_rss
 Erreur E017 "There appears to be a badly formed comment here (comment could not be displayed)" : contenu dans les articles du flux_rss
 
