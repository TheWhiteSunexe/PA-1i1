<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="../bot/bot.js"></script>
<div class="container">
        <div class="row">
            <div id="Smallchat">
                <div class="Layout Layout-open Layout-expand Layout-right" style="background-color: #3F51B5;color: rgb(255, 255, 255);opacity: 5;border-radius: 10px;">
                    <div class="Messenger_messenger">
                        <div class="Messenger_header" style="background-color: #98B9B2; color: rgb(255, 255, 255);">
                            <h4 class="Messenger_prompt">How can we help you?</h4> 
                            <span class="chat_close_icon"><i class="fa fa-window-close" aria-hidden="true"></i></span> 
                        </div>
                        <div id="chat-container" class="Messenger_content">
                            <div id="chat" class="Messages">
                                <!-- Messages will appear here -->
                            </div>
                            <div class="Input Input-blank">
                                <input id="user-input" class="Input_field" placeholder="Send a message..." style="height: 20px;">
                                <button onclick="sendMessage()" class="Input_button Input_button-send">
                                    <div class="Icon" style="width: 18px; height: 18px;">
                                        <svg width="57px" height="54px" viewBox="1496 193 57 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width: 18px; height: 18px;">
                                            <g id="Group-9-Copy-3" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" transform="translate(1523.000000, 220.000000) rotate(-270.000000) translate(-1523.000000, -220.000000) translate(1499.000000, 193.000000)">
                                                <path d="M5.42994667,44.5306122 L16.5955554,44.5306122 L21.049938,20.423658 C21.6518463,17.1661523 26.3121212,17.1441362 26.9447801,20.3958097 L31.6405465,44.5306122 L42.5313185,44.5306122 L23.9806326,7.0871633 L5.42994667,44.5306122 Z M22.0420732,48.0757124 C21.779222,49.4982538 20.5386331,50.5306122 19.0920112,50.5306122 L1.59009899,50.5306122 C-1.20169244,50.5306122 -2.87079654,47.7697069 -1.64625638,45.2980459 L20.8461928,-0.101616237 C22.1967178,-2.8275701 25.7710778,-2.81438868 27.1150723,-0.101616237 L49.6075215,45.2980459 C50.8414042,47.7885641 49.1422456,50.5306122 46.3613062,50.5306122 L29.1679835,50.5306122 C27.7320366,50.5306122 26.4974445,49.5130766 26.2232033,48.1035608 L24.0760553,37.0678766 L22.0420732,48.0757124 Z" id="sendicon" fill="#96AAB4" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat_on"> 
                    <span class="chat_on_icon"><i class="fa fa-comments" aria-hidden="true"></i></span> 
                </div>
            </div>
        </div>
    </div>
    <script>
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
    </script>