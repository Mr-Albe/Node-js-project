const express = require('express');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const fs = require('fs');
const path = require('path');

const app = express();
app.use(bodyParser.json());
app.use(express.json());
app.use(bodyParser.urlencoded({ extended: true }));
// app.use(express.static('web_pages'));
app.use(express.static(path.join(__dirname, 'web_pages')));


// Endpoint pour obtenir les commentaires
app.get('/comments', (req, res) => {
    fs.readFile('comments.json', (err, data) => {
        if (err) {
            return res.status(500).send('Error reading comments');
        }
        res.send(JSON.parse(data));
    });
});

// Endpoint pour ajouter un commentaire
app.post('/comments', (req, res) => {
    const newComment = req.body;
    fs.readFile('comments.json', (err, data) => {
        if (err) {
            return res.status(500).send('Error reading comments');
        }
        
        let comments = JSON.parse(data);
        comments.push(newComment);
        if (comments.length > 10) {
            comments = comments.slice(-10); // Keep only the last 10 comments
        }

        fs.writeFile('comments.json', JSON.stringify(comments, null, 2), (err) => {
            if (err) {
                return res.status(500).send('Error saving comment');
            }
            res.send({ status: 'success' });
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
