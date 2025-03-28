const chatContainer = document.getElementById('chat');
const userInput = document.getElementById('user-input');

function sendMessage() {
    const userMessage = userInput.value.trim();
    if (userMessage !== '') {
        displayMessage(userMessage, 'user');
        processUserMessage(userMessage);
        userInput.value = '';
    }
}

function displayMessage(message, sender) {
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', sender);
    messageElement.innerText = message;
    chatContainer.appendChild(messageElement);
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

//==============================================================Principe n1, réponse simple a un mot===========================================================================================

/*
function processUserMessage(message) {
    // Convertir le message en minuscules pour une correspondance insensible à la casse
    const lowerCaseMessage = message.toLowerCase();

    // Tableau de correspondance entre les mots-clés et les réponses
    const responses = {
        'bonjour': "Bonjour ! Comment puis-je vous aider ?",
        'aide': "Que puis-je faire pour vous assister ?",
        'informations': "Pouvez-vous préciser quelles informations vous cherchez ?",

        // Problèmes techniques
        'problème technique': "Je suis désolé d'apprendre que vous rencontrez un problème technique. Pouvez-vous me donner plus de détails afin que je puisse mieux vous aider ?",
        'panne': "Nous sommes conscients de la panne et travaillons activement pour la résoudre. Merci pour votre patience.",
        'bug': "Merci d'avoir signalé ce bug. Notre équipe technique va enquêter dessus. En attendant, y a-t-il autre chose avec lequel je peux vous aider ?",
        'défaillance': "Une défaillance ? Nous nous excusons pour cet inconvénient. Pourriez-vous fournir plus de détails sur ce qui s'est passé ?",
        'dysfonctionnement': "Je comprends, un dysfonctionnement est très ennuyeux. Pouvez-vous me dire quand et où cela s'est produit ?",
        'incident': "Désolé pour cet incident. Avez-vous rencontré d'autres problèmes récemment ?",
        'erreur': "Une erreur ? Désolé pour cela. Pourriez-vous me donner plus d'informations sur l'erreur que vous avez rencontrée ?",
        'problème de compatibilité': "Les problèmes de compatibilité peuvent être frustrants. Avez-vous essayé des solutions de contournement ?",
        'interruption': "Je suis désolé pour l'interruption. Avez-vous besoin d'aide pour reprendre là où vous en étiez ?",
        'bogues': "Merci pour la notification. Nos développeurs vont enquêter sur ces bogues.",
        'problème de performance': "La performance est essentielle. Pourriez-vous me donner plus de détails sur le problème de performance que vous rencontrez ?",
        'problème de connectivité': "Les problèmes de connectivité peuvent être frustrants. Avez-vous vérifié votre connexion Internet ?",
        'problème de chargement': "Le chargement peut être lent parfois. Avez-vous essayé de rafraîchir la page ?",
        'problème de sécurité': "La sécurité est une priorité. Pourriez-vous fournir plus de détails sur le problème de sécurité que vous avez rencontré ?",
        'problème de fonctionnalité': "Pouvez-vous décrire plus en détail le problème de fonctionnalité que vous rencontrez ?",
        'problème de configuration': "La configuration peut parfois être complexe. Avez-vous suivi les instructions fournies ?",
    
        // Feedback des utilisateurs
        'feedback': "Merci de nous faire part de votre feedback ! Nous apprécions énormément vos commentaires. Veuillez nous dire ce que vous aimez ou ce que nous pourrions améliorer.",
        'avis': "Votre avis est précieux pour nous. N'hésitez pas à partager vos pensées sur notre service. Nous sommes là pour vous écouter !",
        'retours': "Merci pour vos retours ! Ils sont importants pour nous aider à améliorer notre service. Avez-vous d'autres suggestions à partager ?",
        'commentaires': "Nous sommes ravis de recevoir vos commentaires. Que souhaitez-vous nous dire aujourd'hui ?",
        'suggestions': "Avez-vous des suggestions pour améliorer notre service ? Nous sommes toujours ouverts aux nouvelles idées et apprécions votre contribution.",
        'réactions': "Vos réactions sont importantes pour nous. Comment pouvons-nous mieux répondre à vos besoins ?",
        'impressions': "Quelles sont vos impressions sur notre service jusqu'à présent ? Nous sommes désireux d'entendre vos pensées.",
        'évaluations': "Vos évaluations nous aident à comprendre ce que nous faisons bien et ce que nous pouvons améliorer. Merci pour votre contribution !",
        'opinions': "Vos opinions comptent pour nous. N'hésitez pas à les partager avec nous.",
        'critiques': "Les critiques constructives sont les bienvenues. Comment pouvons-nous rendre votre expérience meilleure ?",
        'remarques': "Nous apprécions vos remarques. Comment pouvons-nous mieux vous servir ?",
        'points de vue': "Quels sont vos points de vue sur notre service ? Nous sommes ouverts à toutes les perspectives.",
        'recommandations': "Avez-vous des recommandations à faire à vos pairs sur notre service ? Nous apprécions votre soutien !",
        'expériences utilisateur': "Les expériences utilisateur sont au cœur de notre travail. Comment pouvons-nous améliorer votre expérience ?",
        'observations': "Vos observations sont importantes pour nous aider à identifier les domaines à améliorer. Merci pour votre contribution !",
        'demandes d\'améliorations': "Vos demandes d'améliorations sont prises en compte. Nous travaillons constamment à rendre notre service meilleur."

        // Ajoutez d'autres mots-clés et réponses ici
    };

    // Parcourir les mots-clés et vérifier s'ils sont présents dans le message utilisateur
    for (const keyword in responses) {
        if (lowerCaseMessage.includes(keyword)) {
            // Afficher la réponse associée au mot-clé correspondant
            displayMessage(responses[keyword], 'bot');
            return; // Sortir de la fonction après avoir trouvé une correspondance
        }
    }

    // Si aucun mot-clé correspondant n'est trouvé, afficher un message par défaut
    displayMessage("Désolé, je ne comprends pas. Pouvez-vous reformuler ?", 'bot');
}*/

//==================================================================Principe n2, Question  - Réponse===========================================================================================

let conversationState = 0; // État de la conversation, utilisé pour suivre où nous en sommes dans la conversation

// Définir une fonction pour démarrer la conversation avec un message préétabli
function startConversation() {
    displayMessage("Bonjour ! Je suis le support technique, que puis-je faire pour vous ?", 'bot');
}

// Appeler la fonction au chargement de la page pour démarrer la conversation
window.onload = startConversation;

function processUserMessage(message) {
    const lowerCaseMessage = message.toLowerCase();

    // Structure de la conversation avec différents états
    const technicalSupportConversation = [
        {
            keywords: ['bonjour', 'salut'],
            response: "Bonjour ! Comment puis-je vous aider ?",
            nextState: 1
        },
        {
            keywords: ['problème', 'bug', 'erreur'],
            response: "Quel est le problème que vous rencontrez ?",
            nextState: 2
        },
        {
            keywords: ['connexion', 'internet', 'wifi', 'réseau'],
            response: "Vérifiez d'abord votre connexion Internet. Essayez de redémarrer votre routeur.",
            nextState: 3
        },
        {
            keywords: ['mot de passe', 'mdp'],
            response: "Avez-vous vérifié que vous entrez le bon mot de passe ?",
            nextState: 3
        },
        {
            keywords: ['navigateur', 'browser'],
            response: "Essayez d'utiliser un navigateur différent et voyez si le problème persiste.",
            nextState: 3
        },
        {
            keywords: ['problème matériel', 'hardware'],
            response: "Assurez-vous que tous vos périphériques sont correctement connectés et fonctionnent.",
            nextState: 3
        },
        {
            keywords: ['problème logiciel', 'software'],
            response: "Assurez-vous que votre logiciel est à jour et redémarrez votre appareil.",
            nextState: 3
        },
        {
            keywords: ['oui', 'non'],
            responses: {
                'oui': "Parfait ! Si vous avez d'autres questions, n'hésitez pas à demander.",
                'non': "Je suis désolé de l'entendre. Que puis-je faire d'autre pour vous aider ?"
            },
            nextState: 0
        }
    ];
    

    // Trouver l'état actuel dans la conversation
    const currentState = conversation[conversationState];

    // Vérifier si l'utilisateur a donné une réponse correspondant à l'état actuel
    for (const keyword of currentState.keywords) {
        if (lowerCaseMessage.includes(keyword)) {
            // Afficher la réponse associée au mot-clé correspondant
            if (currentState.responses) {
                // Si des réponses spécifiques sont définies pour différents mots-clés
                for (const key in currentState.responses) {
                    if (lowerCaseMessage.includes(key)) {
                        displayMessage(currentState.responses[key], 'bot');
                        break;
                    }
                }
            } else {
                displayMessage(currentState.response, 'bot');
            }

            // Passer à l'état suivant
            conversationState = currentState.nextState;
            return;
        }
    }

    // Si aucun mot-clé correspondant n'est trouvé, afficher un message par défaut
    displayMessage("Désolé, je ne comprends pas. Pouvez-vous reformuler ?", 'bot');
}
