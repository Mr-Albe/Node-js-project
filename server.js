const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const fs = require('fs');
const path = require('path');

const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('web_pages'));

const COMMENTS_FILE = path.join(__dirname, 'comments.json');

// Endpoint pour obtenir les commentaires
app.get('/comments', (req, res) => {
    fs.readFile(COMMENTS_FILE, 'utf8', (err, data) => {
        if (err) {
            return res.status(500).json({ success: false, error: err.toString() });
        }

        const comments = data ? JSON.parse(data) : [];
        res.status(200).json({ success: true, comments: comments.slice(-10) });
    });
});

// Endpoint pour ajouter un commentaire
app.post('/comments', (req, res) => {
    const { name, comment } = req.body;

    if (!name || !comment) {
        return res.status(400).json({ success: false, error: 'Nom et commentaire sont requis.' });
    }

    fs.readFile(COMMENTS_FILE, 'utf8', (err, data) => {
        if (err && err.code !== 'ENOENT') {
            return res.status(500).json({ success: false, error: err.toString() });
        }

        const comments = data ? JSON.parse(data) : [];
        comments.push({ name, comment });

        fs.writeFile(COMMENTS_FILE, JSON.stringify(comments, null, 2), 'utf8', err => {
            if (err) {
                return res.status(500).json({ success: false, error: err.toString() });
            }

            res.status(200).json({ success: true });
        });
    });
});

// Endpoint pour envoyer un email
app.post('/send-email', (req, res) => {
    const { names, email, message } = req.body;

    if (!names || !email || !message) {
        return res.status(400).json({ success: false, error: 'Tous les champs sont obligatoires.' });
    }

    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'jeanalbikendy@gmail.com',
            pass: 'pwma ppfa nafw uuvo' // Utilisez le mot de passe d'application ici
        }
    });

    const mailOptions = {
        from: email,
        to: 'albikendy.jean@student.ueh.edu.ht',
        subject: `Nouveau message de ${names}`,
        text: `email: ${email}\n\n${message}`
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
