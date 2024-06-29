const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const path = require('path');

const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Servir les fichiers statiques
app.use(express.static(path.join(__dirname, 'web_pages')));


app.post('/send-email', (req, res) => {
    const { name, email, message } = req.body;

    if (!name || !email || !message) {
        return res.status(400).json({ success: false, error: 'Tous les champs sont obligatoires.' });
    }

    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'jeanalbikendy@gmail.com',
            pass: 'pwma ppfa nafw uuvo' // Utilisez le mot de passe d'application généré ici
        }
    });

    const mailOptions = {
        from: email,
        // to: 'albikendy.jean@student.ueh.edu.ht',
        to: 'bendyservilus@gmail.com',
        subject: `Nouveau message de ${name}        
            email: ${email}`, 
        text: message
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return res.status(500).json({ success: false, error: error.toString() });
        }
        res.status(200).json({ success: true, info });
    });
});

const PORT = process.env.PORT || 8080;
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
